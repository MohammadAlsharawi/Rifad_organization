<?php

namespace App\Filament\Resources\PreferredSections\Pages;

use App\Filament\Resources\PreferredSections\PreferredSectionResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditPreferredSection extends EditRecord
{
    protected static string $resource = PreferredSectionResource::class;

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
