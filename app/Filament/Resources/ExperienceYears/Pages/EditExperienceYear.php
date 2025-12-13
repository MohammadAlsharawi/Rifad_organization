<?php

namespace App\Filament\Resources\ExperienceYears\Pages;

use App\Filament\Resources\ExperienceYears\ExperienceYearResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditExperienceYear extends EditRecord
{
    protected static string $resource = ExperienceYearResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
