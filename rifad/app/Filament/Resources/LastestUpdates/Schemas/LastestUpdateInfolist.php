<?php

namespace App\Filament\Resources\LastestUpdates\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class LastestUpdateInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                ImageEntry::make('photo')
                ->square()
                ->size(300),
                TextEntry::make('title')
                    ->label(__('Title'))
                    ->getStateUsing(fn ($record) =>
                        $record->getTranslation('title', app()->getLocale())
                    ),

                TextEntry::make('description')
                    ->label(__('Description'))
                    ->getStateUsing(fn ($record) =>
                        $record->getTranslation('description', app()->getLocale())
                ),
                TextEntry::make('date')
                    ->date(),
                TextEntry::make('time')
                    ->time(),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
