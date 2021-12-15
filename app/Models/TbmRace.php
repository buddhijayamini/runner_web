<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TbmRace extends Model
{
    use HasFactory;

    protected $fillable = [
        'external_id',
        'name',
        'meeting_id'
    ];

    public function meeting(){
        return $this->belongsTo(TbmMeeting::class);
    }

    public function runner() {
        return $this->hasMany(TbmRunner::class);
    }

}
