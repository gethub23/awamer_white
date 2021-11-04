<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Complaint;
use App\Traits\Responses;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\IComplaint;
use App\Http\Requests\Api\Complaints\StoreComplaintRequest;

class ComplaintController extends Controller
{
    use     Responses;

    public function StoreComplaint(StoreComplaintRequest $Request)
    {
        Complaint::create($Request->validated() + (['user_id' => auth()->id()])) ; 
        $this->response('success' , __('apis.complaint_send'));
    }
}
