<?php

namespace App\Filament\Resources\OnlineArabicPaths\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class OnlineArabicPathInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('full_name'),
                TextEntry::make('birth_date')
                    ->date(),
                TextEntry::make('gender'),
                TextEntry::make('grade'),
                TextEntry::make('parent_name'),
                TextEntry::make('phone'),
                TextEntry::make('email')
                    ->label('Email address'),
                TextEntry::make('origin_country'),
                TextEntry::make('residence_country'),
                TextEntry::make('speaks_arabic_id')
                    ->numeric(),
                TextEntry::make('reading_level_id')
                    ->numeric(),
                TextEntry::make('home_language_id')
                    ->numeric(),
                TextEntry::make('friends_language_id')
                    ->numeric(),
                TextEntry::make('school_type_id')
                    ->numeric(),
                TextEntry::make('preferred_sections_id')
                    ->numeric(),
                TextEntry::make('biggest_challenge_id')
                    ->numeric(),
                TextEntry::make('parent_reason_id')
                    ->numeric(),
                TextEntry::make('preferred_time_id')
                    ->numeric(),
                IconEntry::make('has_difficulty')
                    ->boolean(),
                TextEntry::make('how_found_us'),
                IconEntry::make('confirmed')
                    ->boolean(),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
