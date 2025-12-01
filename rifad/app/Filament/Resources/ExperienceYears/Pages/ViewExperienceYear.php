<?php

namespace App\Filament\Resources\ExperienceYears\Pages;

use App\Filament\Resources\ExperienceYears\ExperienceYearResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewExperienceYear extends ViewRecord
{
    protected static string $resource = ExperienceYearResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
