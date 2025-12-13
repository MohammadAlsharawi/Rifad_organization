<?php

namespace App\Filament\Resources\Anaabs\Pages;

use App\Filament\Resources\Anaabs\AnaabResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAnaabs extends ListRecords
{
    protected static string $resource = AnaabResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
