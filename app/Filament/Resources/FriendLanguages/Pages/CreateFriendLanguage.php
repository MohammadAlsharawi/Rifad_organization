<?php

namespace App\Filament\Resources\FriendLanguages\Pages;

use App\Filament\Resources\FriendLanguages\FriendLanguageResource;
use Filament\Resources\Pages\CreateRecord;

class CreateFriendLanguage extends CreateRecord
{
    protected static string $resource = FriendLanguageResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
