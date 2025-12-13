<?php

namespace App\Filament\Resources\Residences\Pages;

use App\Filament\Resources\Residences\ResidenceResource;
use Filament\Resources\Pages\CreateRecord;

class CreateResidence extends CreateRecord
{
    protected static string $resource = ResidenceResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
