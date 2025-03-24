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
        'paragraph',
        'media_type',
        'media_path'
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}

