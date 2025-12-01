<?php

namespace App\Filament\Resources\SpeaksArabics\Pages;

use App\Filament\Resources\SpeaksArabics\SpeaksArabicResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSpeaksArabics extends ListRecords
{
    protected static string $resource = SpeaksArabicResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
