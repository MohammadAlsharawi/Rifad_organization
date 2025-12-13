<?php

namespace App\Filament\Resources\FriendLanguages\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class FriendLanguageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name.en')
                    ->label('Friend Language (EN)')
                    ->required(),

                TextInput::make('name.ar')
                    ->label('Friend Language (AR)')
                    ->required(),
            ]);
    }
}
