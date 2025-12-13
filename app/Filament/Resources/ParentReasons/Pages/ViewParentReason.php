<?php

namespace App\Filament\Resources\ParentReasons\Pages;

use App\Filament\Resources\ParentReasons\ParentReasonResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewParentReason extends ViewRecord
{
    protected static string $resource = ParentReasonResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
