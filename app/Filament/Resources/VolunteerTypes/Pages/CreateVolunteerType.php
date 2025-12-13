<?php

namespace App\Filament\Resources\VolunteerTypes\Pages;

use App\Filament\Resources\VolunteerTypes\VolunteerTypeResource;
use Filament\Resources\Pages\CreateRecord;

class CreateVolunteerType extends CreateRecord
{
    protected static string $resource = VolunteerTypeResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
