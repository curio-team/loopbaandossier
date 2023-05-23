<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UUID;

class Student extends Model
{
    use HasFactory;
    use UUID;

    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function pages(){
        return $this->hasOne(Page::class);
    }

    public function class(){
        return $this->belongsTo(SchoolClass::class, 'class_id', 'id');
    }

    public function feedback(){
        return $this->hasMany(Feedback::class);
    }
}
