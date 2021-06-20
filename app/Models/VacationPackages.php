<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VacationPackages extends Model
{
    use HasFactory;
    protected $fillable=['package_name', 'package_city', 'package_address', 'package_price', 'package_description', 'package_tags','image'];
    public function favpackages() { // FK relationship
            return $this->hasMany(FavPackages::class);
    }
    public function packageres() { // FK relationship
            return $this->hasMany(PackageRes::class);
    }
    public function packagefeedback() { // FK relationship
            return $this->hasMany(PackageFeedback::class);
    }
}
