<?php

namespace App\Filament\Resources\CourseNames\Pages;

use App\Filament\Resources\CourseNames\CourseNameResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditCourseName extends EditRecord
{
    protected static string $resource = CourseNameResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
