<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TbmFormLastRunner extends Model
{
    use HasFactory;

    protected $fillable = [
        'runner_id' => 'required',
    ];

    public function runner(){
        return $this->belongsTo(TbmRunner::class);
    }
}
