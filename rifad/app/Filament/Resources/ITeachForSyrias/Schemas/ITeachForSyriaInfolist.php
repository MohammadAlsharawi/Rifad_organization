<?php

namespace App\Filament\Resources\ITeachForSyrias\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ITeachForSyriaInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('full_name'),
                TextEntry::make('phone'),
                TextEntry::make('email')
                    ->label('Email address'),
                TextEntry::make('residence'),
                TextEntry::make('birth_year'),
                TextEntry::make('gender'),
                TextEntry::make('degree.name')
                    ->numeric(),
                TextEntry::make('sector.name')
                    ->numeric(),
                TextEntry::make('experienceYear.name')
                    ->numeric(),
                TextEntry::make('trainingType.name')
                    ->numeric(),
                TextEntry::make('need.name')
                    ->numeric(),
                TextEntry::make('course.name')
                    ->numeric(),
                IconEntry::make('confirmed')
                    ->boolean(),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
