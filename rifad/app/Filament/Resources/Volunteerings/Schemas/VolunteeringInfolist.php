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
                TextEntry::make('name'),
                TextEntry::make('email')
                    ->label('Email address'),
                TextEntry::make('gender'),
                TextEntry::make('address'),
                TextEntry::make('phone'),
                TextEntry::make('age')
                    ->numeric(),
                TextEntry::make('qualification_id')
                    ->numeric(),
                TextEntry::make('preferred_type_id')
                    ->numeric(),
                IconEntry::make('photo_consent')
                    ->boolean(),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
