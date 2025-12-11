<?php

namespace App\Filament\Resources\Reviews\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ReviewForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('review.en')
                    ->label('Review (EN)')
                    ->required(),

                TextInput::make('review.ar')
                    ->label('Review (AR)')
                    ->required(),
                TextInput::make('name.en')
                    ->label('Name (EN)')
                    ->required(),

                TextInput::make('name.ar')
                    ->label('Name (AR)')
                    ->required(),
            ]);
    }
}
