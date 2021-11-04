<?php

namespace App\Observers;

use File ;
use App\Models\Category;

class CategoryObserver
{
    public function created(Category $row)
    {

        // Wallet::create([
        //     'Category_id' => $Category->id ,
        // ]);      
    }

      public function updating (Category $row)
    {
       if (request()->has('image')) {
             if ($row->getRawOriginal('image') != 'default.png'){
                File::delete(public_path('/storage/images/categories/' . $row->getRawOriginal('image')));
             }
        }
    }

    /**
     * Handle the Category "deleted" event.
     *
     * @param \App\Category $row
     * @return void
     */
    public function deleted(Category $row)
    {
        if ($row->getRawOriginal('image') != 'default.png'){
            File::delete(public_path('/storage/images/categories/' . $row->getRawOriginal('image')));
        }
        
    }

}
