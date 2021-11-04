<?php

namespace App\Observers;

use File ;
use App\Models\Test;

class TestObserver
{
    public function created(Test $row)
    {

        // Wallet::create([
        //     'Test_id' => $Test->id ,
        // ]);      
    }

      public function updating (Test $row)
    {
       if (request()->has('image')) {
             if ($row->getRawOriginal('image') != 'default.png'){
                File::delete(public_path('/storage/images/tests/' . $row->getRawOriginal('image')));
             }
        }
    }

    /**
     * Handle the Test "deleted" event.
     *
     * @param \App\Test $row
     * @return void
     */
    public function deleted(Test $row)
    {
        if ($row->getRawOriginal('image') != 'default.png'){
            File::delete(public_path('/storage/images/tests/' . $row->getRawOriginal('image')));
        }
        
    }

}
