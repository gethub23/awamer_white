<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Jobs\BlockUser;
use App\Jobs\NotifyUser;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Client\AddEditClientRequest;
use Illuminate\Http\Request;

class ClientController extends Controller
{

    /***************************  get all clients  **************************/
    public function index()
    {
        $clients = User::latest()->get();
        return view('admin.clients.index', compact('clients'));
    }


    /***************************  store client **************************/
    public function store(AddEditClientRequest $request)
    {
        User::create($request->all());
        return response()->json();
    }

    /***************************  update client  **************************/
    public function update(AddEditClientRequest $request, $id)
    {
        $user = User::findOrFail($id)->update($request->validated());
        return response()->json();
    }

    /***************************  delete client **************************/
    public function destroy($id)
    {
        $user = User::findOrFail($id)->delete(); 
        return response()->json(['id' =>$id]);
    }

    public function blockUser($id)
    {
        $user = User::findOrFail($id);
        dispatch(new BlockUser($user));
        return redirect()->back()->with('success', 'تم حظر المستخدم بنجاح');
    }

    public function notify(Request $request)
    {
        if ($request->id == 'all'){
            $clients = User::get();
        }else{
            $clients = User::findOrFail($request->id);
        }
        dispatch(new NotifyUser($clients, $request , $request->type));
        return redirect()->back()->with('success', 'تم ارسال الاشعار بنجاح');
    }
    

    public function destroyAll(Request $request)
    {
        $requestIds = json_decode($request->data);
        
        foreach ($requestIds as $id) {
            $ids[] = $id->id;
        }
        if (User::whereIn('id' , $ids)->delete()) {
            return response()->json('success');
        } else {
            return response()->json('failed');
        }
    }
}
