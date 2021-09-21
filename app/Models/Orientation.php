<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orientation extends Model
{
    use HasFactory;
    protected $fillable = [
        'team_id',
        'name',
        'description',
        'banner',
        'active',
    ];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function sections()
    {
        return $this->hasMany(Section::class);
    }

    public function students()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
