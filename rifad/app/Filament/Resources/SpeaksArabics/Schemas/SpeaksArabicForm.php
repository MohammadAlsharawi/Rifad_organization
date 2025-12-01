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
                TextInput::make('name')
                    ->required()
                    ->regex('/^[\pL\s\-]+$/u'),
            ]);
    }
}
