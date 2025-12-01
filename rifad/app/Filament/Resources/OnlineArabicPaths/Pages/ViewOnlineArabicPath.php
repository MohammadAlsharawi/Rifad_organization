<?php

namespace App\Filament\Resources\OnlineArabicPaths\Pages;

use App\Filament\Resources\OnlineArabicPaths\OnlineArabicPathResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewOnlineArabicPath extends ViewRecord
{
    protected static string $resource = OnlineArabicPathResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
