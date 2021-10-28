<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\IntroPartener;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\IntroParteners\Store;

class IntroPartenerController extends Controller
{
    /***************************  get all   **************************/
    public function index()
    {
        $rows = IntroPartener::latest()->get();
        return view('admin.introparteners.index', compact('rows'));
    }
    /***************************  store  **************************/
    public function create()
    {
        return view('admin.introparteners.create');
    }


    /***************************  store  **************************/
    public function store(Store $request)
    {
        IntroPartener::create($request->validated());
        return response()->json(['url' => route('admin.introparteners.index')]);
    }

    /***************************  store  **************************/
    public function edit($id)
    {
        $row = IntroPartener::findOrFail($id);
        return view('admin.introparteners.edit' , ['row' => $row]);
    }

    /***************************  update   **************************/
    public function update(Store $request, $id)
    {
        IntroPartener::findOrFail($id)->update($request->validated());
        return response()->json(['url' => route('admin.introparteners.index')]);
    }

    /***************************  delete  **************************/
    public function destroy($id)
    {
        IntroPartener::findOrFail($id)->delete();
        return response()->json(['id' =>$id]);
    }

    public function destroyAll(Request $request)
    {
        $requestIds = json_decode($request->data);
        
        foreach ($requestIds as $id) {
            $ids[] = $id->id;
        }
        if (IntroPartener::whereIn('id' , $ids)->delete()) {
            return response()->json('success');
        } else {
            return response()->json('failed');
        }
    }
}
