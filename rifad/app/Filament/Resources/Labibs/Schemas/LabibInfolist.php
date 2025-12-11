<?php

namespace App\Filament\Resources\Labibs\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class LabibInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('full_name')
                    ->label(__('Full Name'))
                    ->getStateUsing(fn ($record) =>
                        $record->getTranslation('full_name', app()->getLocale())
                    ),
                TextEntry::make('province')
                    ->label(__('Province'))
                    ->getStateUsing(fn ($record) =>
                        $record->getTranslation('province', app()->getLocale())
                    ),
                TextEntry::make('grade'),
                TextEntry::make('email')
                    ->label('Email address'),
                TextEntry::make('phone'),
                TextEntry::make('course')
                    ->label(__('Course'))
                    ->getStateUsing(fn ($record) =>
                        $record->getTranslation('course', app()->getLocale())
                                ),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
