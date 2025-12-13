<?php

namespace App\Filament\Resources\LastestUpdates\Pages;

use App\Filament\Resources\LastestUpdates\LastestUpdateResource;
use Filament\Resources\Pages\CreateRecord;

class CreateLastestUpdate extends CreateRecord
{
    protected static string $resource = LastestUpdateResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
