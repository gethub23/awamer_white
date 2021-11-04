<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\coupons\Store;
use App\Models\Coupon ;
use App\Traits\Report;


class CouponController extends Controller
{
    /***************************  get all   **************************/
    public function index()
    {
        $rows = Coupon::latest()->get();
        return view('admin.coupons.index', compact('rows'));
    }

    /***************************  store  **************************/
    public function create()
    {
        return view('admin.coupons.create');
    }


    /***************************  store  **************************/
    public function store(Store $request)
    {
        Coupon::create($request->except(['expire_date']) + (['expire_date' => date('Y-m-d H:i:s', strtotime($request->expire_date))]));
        Report::addToLog('  اضافه كوبون خصم') ;
        return response()->json(['url' => route('admin.coupons.index')]);
    }

    /***************************  edit page  **************************/
    public function edit($id)
    {
        $row = Coupon::findOrFail($id);
        return view('admin.coupons.edit' , ['row' => $row]);
    }

    /***************************  update   **************************/
    public function update(Store $request, $id)
    {
        $row = Coupon::findOrFail($id)->update($request->validated() + ([
            'title' => ['ar' => $request->title_ar , 'en' => $request->title_en] , 
            'description' => ['ar' => $request->description_ar , 'en' => $request->description_en]
        ]));
        Report::addToLog('  تعديل كوبون_خصم') ;
        return response()->json(['url' => route('admin.coupons.index')]);
    }

    /***************************  delete  **************************/
    public function destroy($id)
    {
        $row = Coupon::findOrFail($id)->delete();
        Report::addToLog('  حذف كوبون_خصم') ;
        return response()->json(['id' =>$id]);
    }

    public function destroyAll(Request $request)
    {
        $requestIds = json_decode($request->data);
        
        foreach ($requestIds as $id) {
            $ids[] = $id->id;
        }
        if (Coupon::WhereIn('id',$ids)->delete()) {
            Report::addToLog('  حذف العديد من كوبونات_الخصن') ;
            return response()->json('success');
        } else {
            return response()->json('failed');
        }
    }
}
