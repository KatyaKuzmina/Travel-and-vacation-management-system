<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Http\Request;

class Feedback extends Model
{
    use HasFactory;
    protected $fillable=['accommodation/{id}/show'];
}
