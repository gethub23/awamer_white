<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\IntroMessages;
use App\Http\Controllers\Controller;

class IntroMessagesController extends Controller
{
    /***************************  get all   **************************/
    public function index()
    {
        $rows = IntroMessages::latest()->get();
        return view('admin.intromessages.index', compact('rows'));
    }

    /***************************  delete  **************************/
    public function destroy($id)
    {
        IntroMessages::findOrFail($id)->delete();
        return response()->json(['id' =>$id]);
    }

    public function destroyAll(Request $request)
    {
        $requestIds = json_decode($request->data);
        
        foreach ($requestIds as $id) {
            $ids[] = $id->id;
        }
        if (IntroMessages::whereIn('id' , $ids)->delete()) {
            return response()->json('success');
        } else {
            return response()->json('failed');
        }
    }
}
