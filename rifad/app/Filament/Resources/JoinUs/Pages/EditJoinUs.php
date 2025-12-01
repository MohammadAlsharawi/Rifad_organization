<?php

namespace App\Filament\Resources\JoinUs\Pages;

use App\Filament\Resources\JoinUs\JoinUsResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditJoinUs extends EditRecord
{
    protected static string $resource = JoinUsResource::class;

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
