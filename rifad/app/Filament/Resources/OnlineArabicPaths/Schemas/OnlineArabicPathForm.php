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
                TextInput::make('speaks_arabic_id')
                ->required()
                ->numeric()
                ->rules(['exists:speaks_arabics,id']),

                TextInput::make('reading_level_id')
                    ->required()
                    ->numeric()
                    ->rules(['exists:reading_levels,id']),

                TextInput::make('home_language_id')
                    ->required()
                    ->numeric()
                    ->rules(['exists:home_languages,id']),

                TextInput::make('friends_language_id')
                    ->required()
                    ->numeric()
                    ->rules(['exists:friends_languages,id']),

                TextInput::make('school_type_id')
                    ->required()
                    ->numeric()
                    ->rules(['exists:school_types,id']),

                TextInput::make('preferred_sections_id')
                    ->required()
                    ->numeric()
                    ->rules(['exists:preferred_sections,id']),

                TextInput::make('biggest_challenge_id')
                    ->required()
                    ->numeric()
                    ->rules(['exists:biggest_challenges,id']),

                TextInput::make('parent_reason_id')
                    ->required()
                    ->numeric()
                    ->rules(['exists:parent_reasons,id']),

                TextInput::make('preferred_time_id')
                    ->required()
                    ->numeric()
                    ->rules(['exists:preferred_times,id']),

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
