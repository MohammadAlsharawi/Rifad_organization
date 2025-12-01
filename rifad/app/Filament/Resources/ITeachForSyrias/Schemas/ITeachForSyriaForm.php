<?php

namespace App\Filament\Resources\ITeachForSyrias\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ITeachForSyriaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('full_name')
                    ->required()
                    ->regex('/^[\pL\s\-]+$/u'),
                TextInput::make('phone')
                    ->tel()
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->default(null),
                TextInput::make('residence')
                    ->required(),
                DatePicker::make('birth_year')
                    ->label('Birth Year')
                    ->displayFormat('Y')
                    ->format('Y') 
                    ->default(null)
                    ->required(),
                Select::make('gender')
                    ->options(['male' => 'Male', 'female' => 'Female'])
                    ->default(null),
                Select::make('degree_id')
                    ->label('Degree')
                    ->relationship('degree', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),

                Select::make('sector_id')
                    ->label('Sector')
                    ->relationship('sector', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),

                Select::make('experience_year_id')
                    ->label('Experience Years')
                    ->relationship('experienceYear', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),

                Select::make('training_type_id')
                    ->label('Training Type')
                    ->relationship('trainingType', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),

                Select::make('need_id')
                    ->label('Need')
                    ->relationship('need', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),

                Select::make('course_id')
                    ->label('Course')
                    ->relationship('course', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),


                Toggle::make('confirmed')
                    ->required(),
            ]);
    }
}
