<?php

namespace App\Filament\Resources\OnlineArabicPaths\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class OnlineArabicPathForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('full_name')
                    ->required()
                    ->regex('/^[\pL\s\-]+$/u'),

                DatePicker::make('birth_date'),

                Select::make('gender')
                    ->options(['male' => 'Male', 'female' => 'Female'])
                    ->default(null),

                TextInput::make('grade')
                    ->default(null),

                TextInput::make('parent_name')
                    ->default(null)
                    ->regex('/^[\pL\s\-]+$/u'),

                TextInput::make('phone')
                    ->tel()
                    ->default(null),

                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->default(null),

                TextInput::make('origin_country')
                    ->default(null),

                TextInput::make('residence_country')
                    ->default(null),

                Select::make('speaks_arabic_id')
                    ->label('Speaks Arabic')
                    ->relationship('speaksArabic', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),

                Select::make('reading_level_id')
                    ->label('Reading Level')
                    ->relationship('readingLevel', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),

                Select::make('home_language_id')
                    ->label('Home Language')
                    ->relationship('homeLanguage', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),

                Select::make('friends_language_id')
                    ->label('Friends Language')
                    ->relationship('friendLanguage', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),

                Select::make('school_type_id')
                    ->label('School Type')
                    ->relationship('schoolType', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),

                Select::make('preferred_sections_id')
                    ->label('Preferred Sections')
                    ->relationship('preferredSection', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),

                Select::make('biggest_challenge_id')
                    ->label('Biggest Challenge')
                    ->relationship('biggestChallenge', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),

                Select::make('parent_reason_id')
                    ->label('Parent Reason')
                    ->relationship('parentReason', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),

                Select::make('preferred_time_id')
                    ->label('Preferred Time')
                    ->relationship('preferredTime', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),

                Toggle::make('has_difficulty'),

                Textarea::make('difficulty_details')
                    ->default(null)
                    ->columnSpanFull(),

                Textarea::make('notes')
                    ->default(null)
                    ->columnSpanFull()
                    ->regex('/^[\pL\s\-]+$/u'),

                TextInput::make('how_found_us')
                    ->default(null),

                Toggle::make('confirmed')
                    ->required(),
            ]);
    }
}
