<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('default.title_en', 'Nia | Leading Textile Manufacturer');
        $this->migrator->add('default.title_ar', 'Nia | Leading Textile Manufacturer');
        $this->migrator->add('default.main_address_en', 'Commercial Area 9 - Souq Alsafat- Grand Floor- Shop 3640-3642');
        $this->migrator->add('default.main_address_ar', 'المنطقة التجارية 9 - سوق الصفاة - الدور الكبير - محل 3640-3642');
        $this->migrator->add('default.main_address_phones', [['phone'  => '+965-57778030'] , ['phone'  => '+965-60739003'] ]);
        $this->migrator->add('default.main_address_email', 'mail@niatextiles.com');
        $this->migrator->add('default.branches' , []);
        $this->migrator->add('default.branches_other_country' , []);
        $this->migrator->add('default.slider', []);
        $this->migrator->add('default.clients', []);
        $this->migrator->add('default.socials', []);
        $this->migrator->add('default.video', '');
        $this->migrator->add('default.instagram_active', false);
        $this->migrator->add('default.instagram_username', 'NIA.TEXTILE.CO');
        $this->migrator->add('default.instagram_user_id', '39859553012');
        $this->migrator->add('default.instagram_access_token', '39859553012');
        $this->migrator->add('default.instagram_cache_time', 60);
        $this->migrator->add('default.location', ['lat' =>  29.33 , 'lng' =>  47.99]);
    }
};
