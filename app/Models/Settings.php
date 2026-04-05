<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{

    public $primaryKey = 'id';

    protected $table = 'settings';

    protected $fillable = [
        'title',
        'url',
        'meta_keywords',
        'meta_description',
        'logo',
        'favicon',
        'footer_logo',
        'orta_banner',
        'baskan_photo',
        'baskan_fullname',
        'phone',
        'fax',
        'email',
        'address',
        'google_maps',
        'google_analytics',
        'facebook_url',
        'youtube_url',
        'twitter_url',
        'linkedin_url',
        'copyright',
        'privacy_policy',  //gizlilik metni
        'kvkk',
        'suggestion_status',
        'site_status',

    ];

    public function getLogoUrlAttribute()
    {
        return $this->logo
            ? asset('storage/settings/' . $this->logo)
            : null;
    }

    public function getFaviconUrlAttribute()
    {
        return $this->favicon
            ? asset('storage/settings/' . $this->favicon)
            : null;
    }

    public function getFooterLogoUrlAttribute()
    {
        return $this->footer_logo
            ? asset('storage/settings/' . $this->footer_logo)
            : null;
    }

    public function getOrtaBannerUrlAttribute()
    {
        return $this->orta_banner
            ? asset('storage/settings/' . $this->orta_banner)
            : null;
    }

    public function getBaskanPhotoUrlAttribute()
    {
        return $this->baskan_photo
            ? asset('storage/settings/' . $this->baskan_photo)
            : null;
    }

}
