<?php

namespace App\Filament\Resources\OnlineArabicPaths\Pages;

use App\Filament\Resources\OnlineArabicPaths\OnlineArabicPathResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditOnlineArabicPath extends EditRecord
{
    protected static string $resource = OnlineArabicPathResource::class;

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
