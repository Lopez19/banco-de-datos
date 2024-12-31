<?php

namespace App\Filament\Resources\SaberResource\Pages;

use App\Filament\Resources\SaberResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSabers extends ListRecords
{
    protected static string $resource = SaberResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
