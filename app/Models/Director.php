<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Director extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * @var array
     */
    protected $fillable = ['director', 'notes'];

    public function videos()
    {
        return $this->hasMany(Video::class);
    }
}
