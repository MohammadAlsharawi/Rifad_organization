<?php

namespace App\Filament\Resources\Labibs\Pages;

use App\Filament\Resources\Labibs\LabibResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListLabibs extends ListRecords
{
    protected static string $resource = LabibResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
