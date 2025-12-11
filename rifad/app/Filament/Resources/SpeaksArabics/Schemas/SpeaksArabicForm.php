<?php

namespace App\Filament\Resources\SpeaksArabics\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class SpeaksArabicForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name.en')
                    ->label('Speaks Arabic (EN)')
                    ->required(),

                TextInput::make('name.ar')
                    ->label('Speaks Arabic (AR)')
                    ->required()
            ]);
    }
}
