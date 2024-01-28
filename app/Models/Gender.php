<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Gender extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * @var array
     */
    protected $fillable = ['gender', 'notes', 'slug'];

    public function videos()
    {
        return $this->belongsToMany(Video::class, 'gender_video', 'genders_id', 'videos_id');
    }

    public static function boot(): void
    {
        parent::boot();

        static::creating(function ($gender) {
            $gender->slug = Str::slug(Str::ascii($gender->gender), '-');
        });

        static::updating(function ($gender) {
            $gender->slug = Str::slug(Str::ascii($gender->gender), '-');
        });
    }
}
