<?php

namespace App\Filament\Resources\ITeachForSyrias\Pages;

use App\Filament\Resources\ITeachForSyrias\ITeachForSyriaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListITeachForSyrias extends ListRecords
{
    protected static string $resource = ITeachForSyriaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
