<?php

namespace App\Filament\Resources\OnlineArabicPaths\Pages;

use App\Filament\Resources\OnlineArabicPaths\OnlineArabicPathResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListOnlineArabicPaths extends ListRecords
{
    protected static string $resource = OnlineArabicPathResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
