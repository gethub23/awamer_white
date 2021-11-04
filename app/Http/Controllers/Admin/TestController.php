<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\tests\Store;
use App\Models\Test ;
use App\Traits\Report;


class TestController extends Controller
{
    /***************************  get all   **************************/
    public function index()
    {
        $rows = Test::latest()->get();
        return view('admin.tests.index', compact('rows'));
    }

    /***************************  store  **************************/
    public function create()
    {
        return view('admin.tests.create');
    }


    /***************************  store  **************************/
    public function store(Store $request)
    {
        Test::create($request->validated() + ([
            'title' => ['ar' => $request->title_ar , 'en' => $request->title_en] , 
            'description' => ['ar' => $request->description_ar , 'en' => $request->description_en]
        ]));
        Report::addToLog('  اضافه تيست') ;
        return response()->json(['url' => route('admin.tests.index')]);
    }

    /***************************  edit page  **************************/
    public function edit($id)
    {
        $row = Test::findOrFail($id);
        return view('admin.tests.edit' , ['row' => $row]);
    }

    /***************************  update   **************************/
    public function update(Store $request, $id)
    {
        $row = Test::findOrFail($id)->update($request->validated() + ([
            'title' => ['ar' => $request->title_ar , 'en' => $request->title_en] , 
            'description' => ['ar' => $request->description_ar , 'en' => $request->description_en]
        ]));
        Report::addToLog('  تعديل تيست') ;
        return response()->json(['url' => route('admin.tests.index')]);
    }

    /***************************  delete  **************************/
    public function destroy($id)
    {
        $row = Test::findOrFail($id)->delete();
        Report::addToLog('  حذف تيست') ;
        return response()->json(['id' =>$id]);
    }

    public function destroyAll(Request $request)
    {
        $requestIds = json_decode($request->data);
        
        foreach ($requestIds as $id) {
            $ids[] = $id->id;
        }
        if (Test::WhereIn('id',$ids)->delete()) {
            Report::addToLog('  حذف العديد من التيست') ;
            return response()->json('success');
        } else {
            return response()->json('failed');
        }
    }
}
