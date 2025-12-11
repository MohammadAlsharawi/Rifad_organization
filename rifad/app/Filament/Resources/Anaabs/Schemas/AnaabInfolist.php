<?php

namespace App\Filament\Resources\Anaabs\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class AnaabInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name')
                    ->label(__('Name'))
                    ->getStateUsing(fn ($record) =>
                        $record->getTranslation('name', app()->getLocale())
                            ),

                TextEntry::make('phone'),
                TextEntry::make('email')
                    ->label('Email address'),
                TextEntry::make('residence.name')
                    ->label(__('Residence'))
                    ->getStateUsing(fn ($record) =>
                        $record->residence?->getTranslation('name', app()->getLocale())
                                        ),

                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
