<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    // Relationship: A country has many country contents
    public function countryContents()
    {
        return $this->hasMany(CountryContent::class);
    }
}
