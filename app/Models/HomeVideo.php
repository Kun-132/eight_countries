<?php

// App\Models\HomeVideo.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeVideo extends Model
{
    use HasFactory;

    protected $fillable = [
        'video_title',
        'video_url' // ✅ Correct field
    ];
    
}
