<?php

namespace App\Filament\Resources\Anaabs\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class AnaabForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name.en')
                        ->label('Anaab Name (EN)')
                        ->regex('/^[\pL\s\-]+$/u')
                        ->required(),
                TextInput::make('name.ar')
                        ->label('Anaab Name (AR)')
                        ->regex('/^[\pL\s\-]+$/u')
                        ->required(),
                TextInput::make('phone')
                    ->tel()
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->default(null),
                Select::make('residence_id')
                    ->label('Residence')
                    ->relationship('residence', 'name')
                    ->getOptionLabelFromRecordUsing(fn ($record) => $record->getTranslation('name', 'ar') . ' / ' . $record->getTranslation('name', 'en'))
                    ->searchable()
                    ->preload()
                    ->required(),
            ]);
    }
}
