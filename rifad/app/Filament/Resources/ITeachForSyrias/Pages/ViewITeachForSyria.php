<?php

namespace App\Filament\Resources\ITeachForSyrias\Pages;

use App\Filament\Resources\ITeachForSyrias\ITeachForSyriaResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewITeachForSyria extends ViewRecord
{
    protected static string $resource = ITeachForSyriaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
