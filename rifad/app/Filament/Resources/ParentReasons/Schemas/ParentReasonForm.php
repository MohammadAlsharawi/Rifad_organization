<?php

namespace App\Filament\Resources\ParentReasons\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ParentReasonForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name.en')
                    ->label('Parent Reason (EN)')
                    ->required(),

                TextInput::make('name.ar')
                    ->label('Parent Reason (AR)')
                    ->required(),
            ]);
    }
}
