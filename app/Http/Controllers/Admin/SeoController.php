<?php

namespace App\Http\Controllers\Admin;

use App\Models\Seo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Seo\Create;

class SeoController extends Controller
{
    /***************************  get all  **************************/
    public function index()
    {
        $rows = Seo::get();
        return view('admin.seos.index', compact('rows'));
    }

    /***************************  store  **************************/
    public function store(Create $request)
    {
        Seo::create($request->validated() + ([
            'meta_title'        => ['ar' => $request->meta_title_ar , 'en' => $request->meta_title_en] , 
            'meta_description'  => ['ar' => $request->meta_description_ar , 'en' => $request->meta_description_en] ,
            'meta_keywords'     => ['ar' => $request->meta_keywords_ar , 'en' => $request->meta_keywords_en]
        ]));
        return response()->json();
    }

    /***************************  update  **************************/
    public function update(Create $request, $id)
    {
        Seo::findOrFail($id)->update($request->validated() + ([
            'meta_title'        => ['ar' => $request->meta_title_ar , 'en' => $request->meta_title_en] , 
            'meta_description'  => ['ar' => $request->meta_description_ar , 'en' => $request->meta_description_en] ,
            'meta_keywords'     => ['ar' => $request->meta_keywords_ar , 'en' => $request->meta_keywords_en]
        ]));
        return response()->json();
    }

    public function destroy($id)
    {
        Seo::findOrFail($id)->delete() ; 
        return redirect()->back()->with('success', 'تم الحذف بنجاح');
    }

}
