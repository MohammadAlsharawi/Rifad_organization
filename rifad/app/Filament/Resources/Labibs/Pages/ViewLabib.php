<?php

namespace App\Filament\Resources\Labibs\Pages;

use App\Filament\Resources\Labibs\LabibResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewLabib extends ViewRecord
{
    protected static string $resource = LabibResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
