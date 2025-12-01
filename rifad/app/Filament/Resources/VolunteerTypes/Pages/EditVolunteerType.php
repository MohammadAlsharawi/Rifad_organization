<?php

namespace App\Filament\Resources\VolunteerTypes\Pages;

use App\Filament\Resources\VolunteerTypes\VolunteerTypeResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditVolunteerType extends EditRecord
{
    protected static string $resource = VolunteerTypeResource::class;

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
