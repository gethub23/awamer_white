<?php

namespace App\Http\Controllers\Admin;

use App\Models\Social;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\ISocial;
use App\Http\Requests\Admin\Socials\Store;

class SocialController extends Controller
{
    /***************************  get all   **************************/
    public function index()
    {
        $rows = Social::get();
        return view('admin.socials.index', compact('rows'));
    }


    /***************************  store  **************************/
    public function store(Store $request)
    {
        Social::create($request->validated());
        return response()->json();
    }

    /***************************  update   **************************/
    public function update(Store $request, $id)
    {
        Social::findOrFail($id)->update($request->validated());
        return response()->json();
    }

    /***************************  delete  **************************/
    public function destroy($id)
    {
        Social::findOrFail($id)->delete();
        return response()->json(['id' =>$id]);
    }

    public function destroyAll(Request $request)
    {
        $requestIds = json_decode($request->data);
        
        foreach ($requestIds as $id) {
            $ids[] = $id->id;
        }
        if (Social::whereIn('id' , $ids)->delete($ids)) {
            return response()->json('success');
        } else {
            return response()->json('failed');
        }
    }

    public function blockUser($id)
    {
        $client = $this->userRepo->findOrFail($id);
        $this->userRepo->block($client);
        $data = [
            'sender'        => auth()->guard('admin')->id(),
            'title_ar'      => 'حظر',
            'title_en'      => 'Block',
            'message_ar'    => 'تم حظرك من قبل الادراه ',
            'message_en'    => 'You have been banned by admin',
            'data'          => [
                'type'       => 4 ,
            ],
        ];
        dispatch(new BlockUser($client, $data));
        return redirect()->back()->with('success', 'تم حظر المستخدم بنجاح');
    }
    public function notify(Request $request)
    {
        $client = $this->userRepo->findOrFail($request->id);
        $data = [
            'sender'        => auth()->guard('admin')->id(),
            'title_ar'      => 'تنبيه اداري',
            'title_en'      => 'Administrative Notify',
            'message_ar'    => $request->message_ar ? $request->message_ar : $request->message_en ,
            'message_en'    => $request->message_en ? $request->message_en : $request->message_ar,
            'data'          => [
                'type'       => 0 ,
            ],
        ];
        dispatch(new AcceptAd($client, $data));
        return redirect()->back()->with('success', 'تم ارسال الاشعار بنجاح');
    }
}
