<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = ['class_id', 'name', 'code'];

    public function sclass()
    {
        return $this->belongsTo(Sclass::class);
    }
}
