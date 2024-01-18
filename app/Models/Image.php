<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $table = 'video_images';

    protected $fillable = ['videos_id', 'url'];

    public function video()
    {
        return $this->belongsTo(Video::class);
    }
}
