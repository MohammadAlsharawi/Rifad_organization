<?php

namespace App\Filament\Resources\ParentReasons\Pages;

use App\Filament\Resources\ParentReasons\ParentReasonResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditParentReason extends EditRecord
{
    protected static string $resource = ParentReasonResource::class;

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
