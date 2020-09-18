<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Sclass extends Model
{
    protected $table = 'sclasses';
    protected $fillable = ['name'];

    public function subject()
    {
        return $this->hasOne(Subject::class);
    }

    public function sections()
    {
        return $this->hasMany(Section::class);
    }
    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
