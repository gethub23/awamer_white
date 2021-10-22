<?php

namespace App\Traits;

use Illuminate\Http\Exceptions\HttpResponseException;

trait  Responses
{

    public function paginationModel($col)
    {
        $data = [
            'total'             => $col->total() ?? '',
            'count'             => $col->count() ?? '',
            'per_page'          => $col->perPage() ?? '',
            'next_page_url'     => $col->nextPageUrl() ?? '',
            'perv_page_url'     => $col->previousPageUrl() ?? '',
            'current_page'      => $col->currentPage() ?? '',
            'total_pages'       => $col->lastPage() ?? '',
        ];
        return $data;
    }

    /**
     * keys : success, fail, needActive, exit, blocked
    */
    function response($key, $msg, $data = [], $anotherKey = [], $page = false)
    {
        if( auth()->check() )   {
            if(auth()->user()->ban)
                $key =  'blocked';

            if(!auth()->user()->active)
                $key = 'needActive';
        }

        $allResponse['key'] = (string)$key;
        $allResponse['msg'] = (string)$msg;

        if ($data != [] && ($key == 'success' || $key == 'needActive')) {
            $allResponse['data'] = $data;
        }

        if (request('page')) {
            $allResponse['pagination'] = $this->paginationModel($data);
        }

        if (!empty($anotherKey)) {
            foreach ($anotherKey as $key => $value) {
                $allResponse[$key] = $value;
            }
        }
        throw new HttpResponseException(response()->json($allResponse, 200));
    }
}