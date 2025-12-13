<?php

namespace App\Filament\Resources\SpeaksArabics\Pages;

use App\Filament\Resources\SpeaksArabics\SpeaksArabicResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewSpeaksArabic extends ViewRecord
{
    protected static string $resource = SpeaksArabicResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
