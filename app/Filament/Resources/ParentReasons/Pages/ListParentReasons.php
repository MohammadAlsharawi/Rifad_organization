<?php

namespace App\Filament\Resources\ParentReasons\Pages;

use App\Filament\Resources\ParentReasons\ParentReasonResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListParentReasons extends ListRecords
{
    protected static string $resource = ParentReasonResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
