<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;


class Grade extends Model
{
    use HasFactory;

    protected $fillable = ['name','status','code','grade_id'];

/**
 * Get the user that owns the Grade
 *
 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
 */
public function grade(): BelongsTo
{
    return $this->belongsTo(Grade::class, 'grade_id', 'id');
}

}
