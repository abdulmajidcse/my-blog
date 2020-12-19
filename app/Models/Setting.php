<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'app_name',
        'app_title',
        'app_logo',
        'facebook_link',
        'youtube_link',
        'linkedin_link',
        'github_link',
        'twitter_link',
        'meta_keyword',
        'meta_description',
        'meta_image',
    ];
}
