<?php

namespace App\Filament\Resources\ExperienceYears\Pages;

use App\Filament\Resources\ExperienceYears\ExperienceYearResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListExperienceYears extends ListRecords
{
    protected static string $resource = ExperienceYearResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
