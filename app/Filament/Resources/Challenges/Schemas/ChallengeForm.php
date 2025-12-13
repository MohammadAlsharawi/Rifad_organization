<?php

namespace App\Filament\Resources\Challenges\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use LaraZeus\FilamentSpatieTranslatable\Forms\Components\TranslatableTextInput;

class ChallengeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name.en')
                    ->label('Challenge Name (EN)')
                    ->required(),

                TextInput::make('name.ar')
                    ->label('Challenge Name (AR)')
                    ->required()

            ]);
    }
}
