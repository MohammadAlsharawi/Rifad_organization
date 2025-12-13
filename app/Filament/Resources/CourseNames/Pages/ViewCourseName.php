<?php

namespace App\Filament\Resources\CourseNames\Pages;

use App\Filament\Resources\CourseNames\CourseNameResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewCourseName extends ViewRecord
{
    protected static string $resource = CourseNameResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
