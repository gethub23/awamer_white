<?php

namespace App\Traits;

use App\Models\SMS;

trait  SmsTrait
{

    public function sendSms()
    {
        $key = SMS::where(['active' , 1]) ->first()->key ; 
        switch ($key) {
            case 'yamamah':
                # code...
                break;
            case '4jawaly':
                # code...
                break;
            case 'gateway':
                # code...
                break;
            case 'hisms':
                # code...
                break;
            case 'msegat':
                # code...
                break;
            case 'oursms':
                # code...
                break;
            case 'unifonic':
                # code...
                break;
            case 'zain':
                # code...
                break;
        }


    }

    public function jawaly($phone, $msg)
    {
        $data = SMS::where(['key' => '4jawaly'])->first();
        $username = $data->user_name ; 
        $password = $data->password ; 
        $text = urlencode( $msg);
        $sender   = urlencode( $data->sender);

        $url  = "https://www.4jawaly.net/api/sendsms.php?username=$username&password=$password&numbers=$phone&sender=$sender&message=$text&unicode=e&Rmduplicated=1&return=string";
        $result = file_get_contents($url,true);
    }

    public function gateway($phone, $msg)
    {
        $data = SMS::where(['key' => 'gateway'])->first();
        $username = $data->user_name ; 
        $password = $data->password ; 
        $sender   =  $data->sender;
        

        $contextPostValues = http_build_query(array(
            'user' => $username,
            'password' => $password,
            'msisdn' => $phone,
            'sid' => $sender,
            'msg' => $msg,
            'fl' => 0
        ));
        $contextOptions['http'] = array(
            'method' => 'POST',
            'header' => 'Content-type: application/x-www-form-urlencoded',
            'content' => $contextPostValues,
            'max_redirects' => 0,
            'protocol_version' => 1.0,
            'timeout' => 10,
            'ignore_errors' => TRUE
        );
        $contextResouce = stream_context_create($contextOptions);
        $url = "apps.gateway.sa/vendorsms/pushsms.aspx";
        $arrayResult = file($url, FILE_IGNORE_NEW_LINES, $contextResouce);
        $result = $arrayResult[0];
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function hisms($phone , $msg){

    }



}