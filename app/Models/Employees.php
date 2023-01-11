<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    use HasFactory;
    protected $guarded =['id'];

    public function company(){
        return $this->belongsTo(Companies::class);
    }
    public function user(){
        return $this->belongsTo(Users::class);
    }
}
