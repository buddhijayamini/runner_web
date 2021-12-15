<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TbmMeeting extends Model
{
    use HasFactory;

    protected $fillable = [
        'external_id',
        'name'
    ];

    public function race() {
        return $this->hasMany(TbmRace::class);
    }

}
