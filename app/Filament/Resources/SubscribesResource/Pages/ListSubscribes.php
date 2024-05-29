<?php

namespace App\Filament\Resources\SubscribesResource\Pages;

use App\Filament\Resources\SubscribesResource;
use App\Models\Subscribes;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSubscribes extends ListRecords
{
    protected static string $resource = SubscribesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('Download')
                ->label('List Email As CSV File')
                ->icon('carbon-cloud-download')
                ->action(function ($record) {
                    return response()->streamDownload(function () {
                        $file = fopen('php://output', 'w');
                        foreach (Subscribes::all() as $email) {
                            fputcsv($file, [$email->email]);
                        }
                        fclose($file);
                    }, 'Subscribes.csv');
                })
        ];
    }
}
