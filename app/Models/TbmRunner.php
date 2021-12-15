<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TbmRunner extends Model
{
    use HasFactory;

    protected $fillable = [
        'external_id',
        'name',
        'race_id'
    ];

    public function race(){
        return $this->belongsTo(TbmRace::class);
    }

    public function formData() {
        return $this->hasMany(TbmFormData::class);
    }

    public function formLastRunner() {
        return $this->hasMany(TbmFormLastRunner::class);
    }

}
