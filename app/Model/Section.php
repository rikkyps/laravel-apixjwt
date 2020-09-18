<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = ['class_id', 'name'];

    public function class()
    {
        return $this->belongsTo(Sclass::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
