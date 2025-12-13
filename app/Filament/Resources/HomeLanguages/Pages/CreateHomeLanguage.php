<?php

namespace App\Filament\Resources\HomeLanguages\Pages;

use App\Filament\Resources\HomeLanguages\HomeLanguageResource;
use Filament\Resources\Pages\CreateRecord;

class CreateHomeLanguage extends CreateRecord
{
    protected static string $resource = HomeLanguageResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
