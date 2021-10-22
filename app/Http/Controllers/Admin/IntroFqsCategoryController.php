<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\IntroFqsCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\IntroFqsCategories\Store;

class IntroFqsCategoryController extends Controller
{
    /***************************  get all   **************************/
    public function index()
    {
        $rows = IntroFqsCategory::latest()->get();
        return view('admin.introfqscategories.index', compact('rows'));
    }


    /***************************  store  **************************/
    public function store(Store $request)
    {
        IntroFqsCategory::create($request->validated() + (['title' => ['ar' => $request->title_ar , 'en' => $request->title_en]])) ;
        return response()->json();
    }

    /***************************  update   **************************/
    public function update(Store $request, $id)
    {
        IntroFqsCategory::findOrFail($id)->update($request->validated() + (['title' => ['ar' => $request->title_ar , 'en' => $request->title_en]]));
        return response()->json();
    }

    /***************************  delete  **************************/
    public function destroy($id)
    {
        IntroFqsCategory::findOrFail($id)->delete();
        return response()->json(['id' =>$id]);
    }

    public function destroyAll(Request $request)
    {
        $requestIds = json_decode($request->data);
        
        foreach ($requestIds as $id) {
            $ids[] = $id->id;
        }
        if (IntroFqsCategory::whereIn('id' , $ids)->delete()) {
            return response()->json('success');
        } else {
            return response()->json('failed');
        }
    }
}
