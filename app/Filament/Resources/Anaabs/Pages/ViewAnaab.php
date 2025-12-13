<?php

namespace App\Filament\Resources\Anaabs\Pages;

use App\Filament\Resources\Anaabs\AnaabResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewAnaab extends ViewRecord
{
    protected static string $resource = AnaabResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
