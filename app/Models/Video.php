<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Video extends Model
{
    use HasFactory;
    use SoftDeletes;


    /**
     * @var array
     */
    protected $fillable = ['title', 'original_title', 'sinopse', 'type', 'score', 'personal_score', 'watched','notes', 'director_id', 'studio_id'];

    public function director() : BelongsTo
    {
        return $this->belongsTo(Director::class);
    }

    public function studio(): BelongsTo
    {
        return $this->belongsTo(Studio::class, 'studio_id', 'id');
    }

    public function genders(): BelongsToMany
    {
        return $this->belongsToMany(Gender::class, 'gender_video', 'videos_id', 'genders_id');
    }

    public function images()
    {
        return $this->hasMany(Image::class, 'videos_id', 'id');
    }
}
