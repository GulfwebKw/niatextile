<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class DetailsSetting extends Settings
{

    public string $title_en;
    public string $title_ar;
    public string $main_address_en;
    public string $main_address_ar;
    public array $main_address_phones;
    public string $main_address_email;
    public array $branches;
    public array $branches_other_country;
    public array $slider;
    public string $video;
    public bool $instagram_active;
    public string $instagram_username;
    public string $instagram_user_id;
    public string $instagram_access_token;
    public array $clients;
    public array $socials;

    public static function group(): string
    {
        return 'default';
    }
}
