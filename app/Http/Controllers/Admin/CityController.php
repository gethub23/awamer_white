<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\cities\Store;
use App\Models\City ;
use App\Traits\Report;


class CityController extends Controller
{
    /***************************  get all   **************************/
    public function index()
    {
        $rows = City::latest()->get();
        return view('admin.cities.index', compact('rows'));
    }

    /***************************  store  **************************/
    public function create()
    {
        return view('admin.cities.create');
    }


    /***************************  store  **************************/
    public function store(Store $request)
    {
        City::create($request->validated() + ([
            'title' => ['ar' => $request->title_ar , 'en' => $request->title_en] , 
            'description' => ['ar' => $request->description_ar , 'en' => $request->description_en]
        ]));
        Report::addToLog('  اضافه مدينة') ;
        return response()->json(['url' => route('admin.cities.index')]);
    }

    /***************************  edit page  **************************/
    public function edit($id)
    {
        $row = City::findOrFail($id);
        return view('admin.cities.edit' , ['row' => $row]);
    }

    /***************************  update   **************************/
    public function update(Store $request, $id)
    {
        $row = City::findOrFail($id)->update($request->validated() + ([
            'title' => ['ar' => $request->title_ar , 'en' => $request->title_en] , 
            'description' => ['ar' => $request->description_ar , 'en' => $request->description_en]
        ]));
        Report::addToLog('  تعديل مدينة') ;
        return response()->json(['url' => route('admin.cities.index')]);
    }

    /***************************  delete  **************************/
    public function destroy($id)
    {
        $row = City::findOrFail($id)->delete();
        Report::addToLog('  حذف مدينة') ;
        return response()->json(['id' =>$id]);
    }

    public function destroyAll(Request $request)
    {
        $requestIds = json_decode($request->data);
        
        foreach ($requestIds as $id) {
            $ids[] = $id->id;
        }
        if (City::WhereIn('id',$ids)->delete()) {
            Report::addToLog('  حذف العديد من المدن') ;
            return response()->json('success');
        } else {
            return response()->json('failed');
        }
    }
}
