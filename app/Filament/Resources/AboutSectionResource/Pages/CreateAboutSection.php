<?php

namespace App\Filament\Resources\AboutSectionResource\Pages;

use App\Filament\Resources\AboutSectionResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAboutSection extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;
    protected static string $resource = AboutSectionResource::class;
    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            // ...
        ];
    }
}
