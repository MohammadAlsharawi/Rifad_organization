<?php

namespace App\Filament\Resources\ExperienceYears\Pages;

use App\Filament\Resources\ExperienceYears\ExperienceYearResource;
use Filament\Resources\Pages\CreateRecord;

class CreateExperienceYear extends CreateRecord
{
    protected static string $resource = ExperienceYearResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
