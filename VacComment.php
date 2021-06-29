<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Http\Request;

class VacFeedback extends Model
{
    use HasFactory;
    protected $fillable=['vacation/{id}/show'];
}
