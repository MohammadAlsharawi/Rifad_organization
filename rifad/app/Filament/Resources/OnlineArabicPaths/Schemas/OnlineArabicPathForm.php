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
                TextInput::make('full_name.en')
                    ->label('Full Name (EN)')
                    ->required()
                    ->regex('/^[\pL\s\-]+$/u'),

                TextInput::make('full_name.ar')
                    ->label('Full Name (AR)')
                    ->required()
                    ->regex('/^[\pL\s\-]+$/u'),

                DatePicker::make('birth_date'),

                Select::make('gender')
                    ->options(['male' => 'Male', 'female' => 'Female'])
                    ->default(null),

                TextInput::make('grade')
                    ->default(null),

                TextInput::make('parent_name.en')
                    ->label('Parent Name (EN)')
                    ->regex('/^[\pL\s\-]+$/u')
                    ->required(),

                TextInput::make('parent_name.ar')
                    ->label('Parent Name (AR)')
                    ->regex('/^[\pL\s\-]+$/u')
                    ->required(),

                TextInput::make('phone')
                    ->tel()
                    ->default(null),

                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->default(null),

                TextInput::make('origin_country.en')
                    ->label('Origin Country (EN)')
                    ->required(),

                TextInput::make('origin_country.ar')
                    ->label('Origin Country (AR)')
                    ->required(),

                TextInput::make('residence_country.en')
                    ->label('Residence Country (EN)')
                    ->required(),

                TextInput::make('residence_country.ar')
                    ->label('Residence Country (AR)')
                    ->required(),

                Select::make('speaks_arabic_id')
                    ->label('Speaks Arabic')
                    ->relationship('speaksArabic', 'name')
                    ->getOptionLabelFromRecordUsing(fn ($record) =>
                        $record->getTranslation('name', 'ar') . ' / ' . $record->getTranslation('name', 'en')
                    )
                    ->searchable()
                    ->preload()
                    ->required(),

                Select::make('reading_level_id')
                    ->label('Reading Level')
                    ->relationship('readingLevel', 'name')
                    ->getOptionLabelFromRecordUsing(fn ($record) =>
                        $record->getTranslation('name', 'ar') . ' / ' . $record->getTranslation('name', 'en')
                    )
                    ->searchable()
                    ->preload()
                    ->required(),

                Select::make('home_language_id')
                    ->label('Home Language')
                    ->relationship('homeLanguage', 'name')
                    ->getOptionLabelFromRecordUsing(fn ($record) =>
                        $record->getTranslation('name', 'ar') . ' / ' . $record->getTranslation('name', 'en')
                    )
                    ->searchable()
                    ->preload()
                    ->required(),

                Select::make('friends_language_id')
                    ->label('Friends Language')
                    ->relationship('friendLanguage', 'name')
                    ->getOptionLabelFromRecordUsing(fn ($record) =>
                        $record->getTranslation('name', 'ar') . ' / ' . $record->getTranslation('name', 'en')
                    )
                    ->searchable()
                    ->preload()
                    ->required(),

                Select::make('school_type_id')
                    ->label('School Type')
                    ->relationship('schoolType', 'name')
                    ->getOptionLabelFromRecordUsing(fn ($record) =>
                        $record->getTranslation('name', 'ar') . ' / ' . $record->getTranslation('name', 'en')
                    )
                    ->searchable()
                    ->preload()
                    ->required(),

                Select::make('preferred_sections_id')
                    ->label('Preferred Sections')
                    ->relationship('preferredSection', 'name')
                    ->getOptionLabelFromRecordUsing(fn ($record) =>
                        $record->getTranslation('name', 'ar') . ' / ' . $record->getTranslation('name', 'en')
                    )
                    ->searchable()
                    ->preload()
                    ->required(),

                Select::make('biggest_challenge_id')
                    ->label('Biggest Challenge')
                    ->relationship('biggestChallenge', 'name')
                    ->getOptionLabelFromRecordUsing(fn ($record) =>
                        $record->getTranslation('name', 'ar') . ' / ' . $record->getTranslation('name', 'en')
                    )
                    ->searchable()
                    ->preload()
                    ->required(),

                Select::make('parent_reason_id')
                    ->label('Parent Reason')
                    ->relationship('parentReason', 'name')
                    ->getOptionLabelFromRecordUsing(fn ($record) =>
                        $record->getTranslation('name', 'ar') . ' / ' . $record->getTranslation('name', 'en')
                    )
                    ->searchable()
                    ->preload()
                    ->required(),

                Select::make('preferred_time_id')
                    ->label('Preferred Time')
                    ->relationship('preferredTime', 'name')
                    ->getOptionLabelFromRecordUsing(fn ($record) =>
                        $record->getTranslation('name', 'ar') . ' / ' . $record->getTranslation('name', 'en')
                    )
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
