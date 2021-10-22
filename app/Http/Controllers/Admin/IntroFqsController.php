<?php

namespace App\Http\Controllers\Admin;

use App\Models\IntroFqs;
use Illuminate\Http\Request;
use App\Models\IntroFqsCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\IntroFqs\Store;

class IntroFqsController extends Controller
{
    /***************************  get all   **************************/
    public function index()
    {
        $rows = IntroFqs::latest()->get();
        $categories = IntroFqsCategory::get() ;
        return view('admin.introfqs.index', compact('rows' ,'categories'));
    }


    /***************************  store  **************************/
    public function store(Store $request)
    {
        IntroFqs::create($request->validated() + ([
                'title' => ['ar' => $request->title_ar , 'en' => $request->title_en] , 
                'description' => ['ar' => $request->description_ar , 'en' => $request->description_en]
            ])) ;
        return response()->json();
    }

    /***************************  update   **************************/
    public function update(Store $request, $id)
    {
        IntroFqs::findOrFail($id)->update($request->validated() + ([
            'title' => ['ar' => $request->title_ar , 'en' => $request->title_en] , 
            'description' => ['ar' => $request->description_ar , 'en' => $request->description_en]
        ])) ;
        return response()->json();
    }

    /***************************  delete  **************************/
    public function destroy($id)
    {
        IntroFqs::findOrFail($id)->delete();
        return response()->json(['id' =>$id]);
    }

    public function destroyAll(Request $request)
    {
        $requestIds = json_decode($request->data);
        
        foreach ($requestIds as $id) {
            $ids[] = $id->id;
        }
        if (IntroFqs::whereIn('id' , $ids)->delete()) {
            return response()->json('success');
        } else {
            return response()->json('failed');
        }
    }
}
