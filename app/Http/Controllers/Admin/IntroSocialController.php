<?php

namespace App\Http\Controllers\Admin;

use App\Models\IntroSocial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\IntroSocials\Store;

class IntroSocialController extends Controller
{
    /***************************  get all   **************************/
    public function index()
    {
        $rows = IntroSocial::get();
        return view('admin.introsocials.index', compact('rows'));
    }


    /***************************  store  **************************/
    public function store(Store $request)
    {
        IntroSocial::create($request->validated());
        return response()->json();
    }

    /***************************  update   **************************/
    public function update(Store $request, $id)
    {
        IntroSocial::findOrFail($id)->update($request->validated());
        return response()->json();
    }

    /***************************  delete  **************************/
    public function destroy($id)
    {
        IntroSocial::findOrFail($id)->delete();
        return response()->json(['id' =>$id]);
    }

    public function destroyAll(Request $request)
    {
        $requestIds = json_decode($request->data);
        
        foreach ($requestIds as $id) {
            $ids[] = $id->id;
        }
        if (IntroSocial::whereIn('id' , $ids)->delete()) {
            return response()->json('success');
        } else {
            return response()->json('failed');
        }
    }
}
