<?php

namespace App\Filament\Resources\CourseNames\Pages;

use App\Filament\Resources\CourseNames\CourseNameResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCourseNames extends ListRecords
{
    protected static string $resource = CourseNameResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
