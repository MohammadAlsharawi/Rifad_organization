<?php

namespace App\Filament\Resources\JoinUs\Pages;

use App\Filament\Resources\JoinUs\JoinUsResource;
use Filament\Resources\Pages\CreateRecord;

class CreateJoinUs extends CreateRecord
{
    protected static string $resource = JoinUsResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
