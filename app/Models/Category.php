<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


use Illuminate\Database\Eloquent\SoftDeletes; //soft delete trait (link is called trait in laravel)





class Category extends Model
{

    // use HasFactory, SoftDeletes;
    //or,
    use HasFactory;
    use SoftDeletes; //soft delete use





    protected $fillable = ['category_name']; //updating protocol and rules in laravel
    // protected $guarded = [''];



    // relational database system: one to one connection

    public function UserXCategory()
    {
        return $this->belongsTo(User::class, 'added_by', 'id');
        // return $this->belongsTo(User::class, 'foreign_key', 'primary/owner_key');
    }
}
