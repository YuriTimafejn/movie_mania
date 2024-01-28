<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Director extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * @var array
     */
    protected $fillable = ['director', 'notes', 'slug'];

    public function videos()
    {
        return $this->hasMany(Video::class);
    }

    public static function boot(): void
    {
        parent::boot();

        static::creating(function ($director) {
            $director->slug = Str::slug(Str::ascii($director->director), '-');
        });

        static::updating(function ($director) {
            $director->slug = Str::slug(Str::ascii($director->director), '-');
        });
    }
}
