<?php

namespace App\Filament\Resources\Labibs\Pages;

use App\Filament\Resources\Labibs\LabibResource;
use Filament\Resources\Pages\CreateRecord;

class CreateLabib extends CreateRecord
{
    protected static string $resource = LabibResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
