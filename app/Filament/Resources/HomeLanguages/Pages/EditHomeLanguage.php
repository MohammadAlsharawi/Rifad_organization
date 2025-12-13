<?php

namespace App\Filament\Resources\HomeLanguages\Pages;

use App\Filament\Resources\HomeLanguages\HomeLanguageResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditHomeLanguage extends EditRecord
{
    protected static string $resource = HomeLanguageResource::class;

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
