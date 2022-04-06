<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'user_id'
    ];

    // public function myUserRelation(){
    //     //$this = model belongsTo(className,foreign key)
    //     return $this->belongsTo(User::class,'user_id');
    // }

    public function user(){ // foreign key from the name of the function functionname_id
        //$this = model belongsTo(className)
        return $this->belongsTo(User::class);
    }
}
