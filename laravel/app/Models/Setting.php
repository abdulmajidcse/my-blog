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
        'app_description',
        'app_logo',
        'facebook_link',
        'youtube_link',
        'linkedin_link',
        'github_link',
        'twitter_link',
        'google_verification_code',
        'bing_verification_code',
        'seo_keyword',
        'seo_description',
        'seo_image',
    ];
}
