<?php

namespace App\Filament\Resources\ITeachForSyrias\Pages;

use App\Filament\Resources\ITeachForSyrias\ITeachForSyriaResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditITeachForSyria extends EditRecord
{
    protected static string $resource = ITeachForSyriaResource::class;

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
