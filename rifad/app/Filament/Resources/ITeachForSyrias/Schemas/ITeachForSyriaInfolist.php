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
                    ->numeric()
                    ->label('degree name'),
                TextEntry::make('sector.name')
                    ->numeric()
                    ->label('sector name'),
                TextEntry::make('experienceYear.name')
                    ->numeric()
                    ->label('experience name'),
                TextEntry::make('trainingType.name')
                    ->numeric()
                    ->label('training type'),
                TextEntry::make('need.name')
                    ->numeric()
                    ->label('need'),
                TextEntry::make('course.name')
                    ->numeric()
                    ->label('course name'),
                IconEntry::make('confirmed')
                    ->boolean(),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
