<?php

namespace App\Filament\Resources\CourseNames\Pages;

use App\Filament\Resources\CourseNames\CourseNameResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCourseName extends CreateRecord
{
    protected static string $resource = CourseNameResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
