<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryContent extends Model
{
    use HasFactory;

    protected $fillable = [
        'country_id',
        'section_id',
        'side_nav_link_name',
        'title',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    // 🔗 Relationship with flexible content blocks
    public function blocks()
    {
        return $this->hasMany(CountryContentBlock::class);
    }
}
