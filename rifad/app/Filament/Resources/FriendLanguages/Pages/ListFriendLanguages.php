<?php

namespace App\Filament\Resources\FriendLanguages\Pages;

use App\Filament\Resources\FriendLanguages\FriendLanguageResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFriendLanguages extends ListRecords
{
    protected static string $resource = FriendLanguageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
