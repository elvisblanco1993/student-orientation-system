<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $fillable = [
        'orientation_id',
        'type',
        'title',
        'content',
        'url',
        'file',
        'position'
    ];

    public function question()
    {
        return $this->hasOne(Question::class);
    }

    public function orientation()
    {
        return $this->belongsTo(Orientation::class)->withDefault();
    }
}
