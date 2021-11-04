<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    protected $fillable = ['user_name' , 'user_id' , 'complaint' , 'phone' , 'email']; 
    /**
     * Get the user that owns the Complaint
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
