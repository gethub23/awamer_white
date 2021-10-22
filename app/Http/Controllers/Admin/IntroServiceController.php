<?php

namespace App\Http\Controllers\Admin;

use App\Models\IntroService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\IntroServices\Store;

class IntroServiceController extends Controller
{
    /***************************  get all   **************************/
    public function index()
    {
        $rows = IntroService::latest()->get();
        return view('admin.introservices.index', compact('rows'));
    }


    /***************************  store  **************************/
    public function store(Store $request)
    {
        IntroService::create($request->validated() + ([
            'title' => ['ar' => $request->title_ar , 'en' => $request->title_en] , 
            'description' => ['ar' => $request->description_ar , 'en' => $request->description_en]
        ]));
        return response()->json();
    }

    /***************************  update   **************************/
    public function update(Store $request, $id)
    {
        IntroService::findOrFail($id)->update($request->validated() + ([
            'title' => ['ar' => $request->title_ar , 'en' => $request->title_en] , 
            'description' => ['ar' => $request->description_ar , 'en' => $request->description_en]
        ]));
        return response()->json();
    }

    /***************************  delete  **************************/
    public function destroy($id)
    {
        IntroService::findOrFail($id)->delete();
        return response()->json(['id' =>$id]);
    }

    public function destroyAll(Request $request)
    {
        $requestIds = json_decode($request->data);
        
        foreach ($requestIds as $id) {
            $ids[] = $id->id;
        }
        if (IntroService::whereIn('id' , $ids)->delete()) {
            return response()->json('success');
        } else {
            return response()->json('failed');
        }
    }
}
