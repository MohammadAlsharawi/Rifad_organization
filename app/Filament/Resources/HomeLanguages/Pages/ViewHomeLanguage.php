<?php

namespace App\Filament\Resources\HomeLanguages\Pages;

use App\Filament\Resources\HomeLanguages\HomeLanguageResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewHomeLanguage extends ViewRecord
{
    protected static string $resource = HomeLanguageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
