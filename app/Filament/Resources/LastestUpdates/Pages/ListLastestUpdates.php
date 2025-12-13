<?php

namespace App\Filament\Resources\LastestUpdates\Pages;

use App\Filament\Resources\LastestUpdates\LastestUpdateResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListLastestUpdates extends ListRecords
{
    protected static string $resource = LastestUpdateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
