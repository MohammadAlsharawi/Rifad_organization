<?php

namespace App\Filament\Resources\Volunteerings\Pages;

use App\Filament\Resources\Volunteerings\VolunteeringResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListVolunteerings extends ListRecords
{
    protected static string $resource = VolunteeringResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
