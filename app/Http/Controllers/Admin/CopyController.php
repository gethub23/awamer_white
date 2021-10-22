<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\copys\Store;
use App\Models\Copy ;

class CopyController extends Controller
{
    /***************************  get all   **************************/
    public function index()
    {
        $rows = Copy::latest()->get();
        return view('admin.copys.index', compact('rows'));
    }


    /***************************  store  **************************/
    public function store(Store $request)
    {
        Copy::create($request->validated());
        return response()->json();
    }

    /***************************  update   **************************/
    public function update(Store $request, $id)
    {
        $row = Copy::findOrFail($id)->update($request->validated());
        return response()->json();
    }

    /***************************  delete  **************************/
    public function destroy($id)
    {
        $row = Copy::findOrFail($id)->delete();
        return response()->json(['id' =>$id]);
    }

    public function destroyAll(Request $request)
    {
        $requestIds = json_decode($request->data);
        
        foreach ($requestIds as $id) {
            $ids[] = $id->id;
        }
        if (Copy::WhereIn('id',$ids)->delete()) {
            return response()->json('success');
        } else {
            return response()->json('failed');
        }
    }
}
