<?php

namespace App\Filament\Resources\SchoolTypes\Pages;

use App\Filament\Resources\SchoolTypes\SchoolTypeResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewSchoolType extends ViewRecord
{
    protected static string $resource = SchoolTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
