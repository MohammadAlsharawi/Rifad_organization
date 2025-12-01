<?php

namespace App\Filament\Resources\FriendLanguages\Pages;

use App\Filament\Resources\FriendLanguages\FriendLanguageResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewFriendLanguage extends ViewRecord
{
    protected static string $resource = FriendLanguageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
