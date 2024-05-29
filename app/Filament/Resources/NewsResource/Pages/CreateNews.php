<?php

namespace App\Filament\Resources\NewsResource\Pages;

use App\Filament\Resources\NewsResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Str;

class CreateNews extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;
    protected static string $resource = NewsResource::class;


    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['author_id'] = filament()->auth()->user()->id;
        return $data;
    }
    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            // ...
        ];
    }
}
