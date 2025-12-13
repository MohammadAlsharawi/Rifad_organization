<?php

namespace App\Filament\Resources\Volunteerings\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class VolunteeringInfolist
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
                TextEntry::make('email')
                    ->label('Email address'),
                TextEntry::make('gender')
                    ->label(__('Gender'))
                    ->getStateUsing(fn ($record) => __($record->gender)),
                TextEntry::make('address')
                    ->label(__('Address'))
                    ->getStateUsing(fn ($record) =>
                        $record->getTranslation('address', app()->getLocale())
                    ),
                TextEntry::make('phone'),
                TextEntry::make('age')
                    ->numeric(),
                TextEntry::make('qualification.name')
                    ->label(__('Qualification'))
                    ->getStateUsing(fn ($record) =>
                        $record->qualification?->getTranslation('name', app()->getLocale())
                    ),

                TextEntry::make('preferredType.name')
                    ->label(__('Preferred Type'))
                    ->getStateUsing(fn ($record) =>
                        $record->preferredType?->getTranslation('name', app()->getLocale())
                    ),
                IconEntry::make('photo_consent')
                    ->boolean(),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
