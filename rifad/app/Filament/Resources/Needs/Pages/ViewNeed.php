<?php

namespace App\Filament\Resources\Needs\Pages;

use App\Filament\Resources\Needs\NeedResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewNeed extends ViewRecord
{
    protected static string $resource = NeedResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
