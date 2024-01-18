<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Studio extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'studios';

    /**
     * @var array
     */
    protected $fillable = ['studio', 'notes'];

    public function videos(): HasMany
    {
        return $this->hasMany(Video::class);
    }
}
