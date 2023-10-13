<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// name
// email
// password
// type admin , user
class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
}
