<?php

namespace App\Filament\Resources\Anaabs\Pages;

use App\Filament\Resources\Anaabs\AnaabResource;
use Filament\Resources\Pages\CreateRecord;

class CreateAnaab extends CreateRecord
{
    protected static string $resource = AnaabResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
