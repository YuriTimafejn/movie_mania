<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gender extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * @var array
     */
    protected $fillable = ['gender', 'notes'];

    public function videos()
    {
        return $this->belongsToMany(Video::class, 'gender_video', 'genders_id', 'videos_id');
    }
}
