<?php

namespace App\Filament\Resources\AboutSectionResource\Pages;

use App\Filament\Resources\AboutSectionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAboutSections extends ListRecords
{
    use ListRecords\Concerns\Translatable;
    protected static string $resource = AboutSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\CreateAction::make(),
        ];
    }
}
