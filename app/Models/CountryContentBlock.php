<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryContentBlock extends Model
{
    use HasFactory;

    protected $fillable = [
        'country_content_id',
        'type',
        'content',
        'media_path',
        'order',
    ];

    public function countryContent()
    {
        return $this->belongsTo(CountryContent::class);
    }
}
