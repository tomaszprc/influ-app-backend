<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Influencer extends Model
{
    use HasApiTokens, HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['username', 'email','password', 'description', 'first_name', 'last_name', 'verified', 'youtube_url', 'instagram_url', 'tiktok_url'];
}
