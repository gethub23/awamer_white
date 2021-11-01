<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Traits\Report;
use App\Jobs\BlockUser;
use App\Jobs\NotifyUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Client\AddEditClientRequest;

class ClientController extends Controller
{

    /***************************  get all clients  **************************/
    public function index()
    {
        $rows = User::latest()->get();
        return view('admin.clients.index', compact('rows'));
    }
    /***************************  get active clients  **************************/
    public function active()
    {
        $rows = User::where(['active' => 1])->get();
        return view('admin.clients.index', compact('rows'));
    }
    /***************************  get not active clients  **************************/
    public function notActive()
    {
        $rows = User::where(['active' => 0])->get();
        return view('admin.clients.index', compact('rows'));
    }
    /***************************  get active clients  **************************/
    public function block()
    {
        $rows = User::where(['block' => 1])->get();
        return view('admin.clients.index', compact('rows'));
    }
    /***************************  get active clients  **************************/
    public function notBlock()
    {
        $rows = User::where(['block' => 0])->get();
        return view('admin.clients.index', compact('rows'));
    }

     /***************************  store  **************************/
     public function create()
     {
         return view('admin.clients.create');
     }

    /***************************  store client **************************/
    public function store(AddEditClientRequest $request)
    {
        User::create($request->all());
        Report::addToLog('  اضافه مستخدم') ;
        return response()->json(['url' => route('admin.clients.index')]);
    }
    /***************************  store  **************************/
    public function edit($id)
    {
        $row = User::findOrFail($id);
        return view('admin.clients.edit' , ['row' => $row]);
    }
    /***************************  update client  **************************/
    public function update(AddEditClientRequest $request, $id)
    {
        $user = User::findOrFail($id)->update($request->validated());
        Report::addToLog('  تعديل مستخدم') ;
        return response()->json(['url' => route('admin.clients.index')]);
    }

    /***************************  delete client **************************/
    public function destroy($id)
    {
        $user = User::findOrFail($id)->delete(); 
        Report::addToLog('  حذف مستخدم') ;
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
        return response()->json();
    }
    

    public function destroyAll(Request $request)
    {
        $requestIds = json_decode($request->data);
        
        foreach ($requestIds as $id) {
            $ids[] = $id->id;
        }
        if (User::whereIn('id' , $ids)->delete()) {
            Report::addToLog('  حذف العديد من المستخدمين') ;
            return response()->json('success');
        } else {
            return response()->json('failed');
        }
    }
}
