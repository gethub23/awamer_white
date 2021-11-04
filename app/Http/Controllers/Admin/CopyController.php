<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\copys\Store;
use App\Models\Copy ;
use App\Traits\Report;


class CopyController extends Controller
{
    /***************************  get all   **************************/
    public function index()
    {
        $rows = Copy::latest()->get();
        return view('admin.copys.index', compact('rows'));
    }

    /***************************  store  **************************/
    public function create()
    {
        return view('admin.copys.create');
    }


    /***************************  store  **************************/
    public function store(Store $request)
    {
        Copy::create($request->validated() + ([
            'title' => ['ar' => $request->title_ar , 'en' => $request->title_en] , 
            'description' => ['ar' => $request->description_ar , 'en' => $request->description_en]
        ]));
        Report::addToLog('  اضافه arsinglesame') ;
        return response()->json(['url' => route('admin.copys.index')]);
    }

    /***************************  edit page  **************************/
    public function edit($id)
    {
        $row = Copy::findOrFail($id);
        return view('admin.copys.edit' , ['row' => $row]);
    }

    /***************************  update   **************************/
    public function update(Store $request, $id)
    {
        $row = Copy::findOrFail($id)->update($request->validated() + ([
            'title' => ['ar' => $request->title_ar , 'en' => $request->title_en] , 
            'description' => ['ar' => $request->description_ar , 'en' => $request->description_en]
        ]));
        Report::addToLog('  تعديل arsinglesame') ;
        return response()->json(['url' => route('admin.copys.index')]);
    }

    /***************************  delete  **************************/
    public function destroy($id)
    {
        $row = Copy::findOrFail($id)->delete();
        Report::addToLog('  حذف arsinglesame') ;
        return response()->json(['id' =>$id]);
    }

    public function destroyAll(Request $request)
    {
        $requestIds = json_decode($request->data);
        
        foreach ($requestIds as $id) {
            $ids[] = $id->id;
        }
        if (Copy::WhereIn('id',$ids)->delete()) {
            Report::addToLog('  حذف العديد من arpluraleName') ;
            return response()->json('success');
        } else {
            return response()->json('failed');
        }
    }
}
