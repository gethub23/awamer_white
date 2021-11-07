<?php

namespace App\Traits;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Models\UserToken ;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use FCM;
trait  Firebase
{
    public function sendNotification($tokens , $data)
    {
        // $firebaseToken = UserToken::where('user_id' , $user->id)->pluck('device_id')->all();
        $SERVER_API_KEY = 'AAAAVYoWgDU:APA91bEU9m3M7z5TeNAlKqwl2sI5XU78yNRDCNPt95M2RDjfZG9O5ZGxrH_wcqIClEDY3TWgyMOp9vH56O5ilbm2vYp-8tIN_8dGvnbtea4s5hMlXYyCQZR2h0kM07l3pXB9iiZbgz_q';
        $data = [
            "registration_ids" => $tokens,
            "notification" => [
                "title" => $data['title_'.lang()],
                "body"  => $data['message_'.lang()],
                'sound' => true,
            ],
            'data'  => $data
        ];
        $dataString = json_encode($data);
        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
        $response = curl_exec($ch);
    }
}

