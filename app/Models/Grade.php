<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    protected $fillable = ['name','status','description','level_id'];

/**
 * Get the user that owns the Grade
 *
 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
 */
public function level(): BelongsTo
{
    return $this->belongsTo(Level::class, 'level_id', 'id');
}

}
