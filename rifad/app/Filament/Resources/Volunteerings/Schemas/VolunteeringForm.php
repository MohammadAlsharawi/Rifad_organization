<?php

namespace App\Filament\Resources\Volunteerings\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class VolunteeringForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name.en')
                    ->label('Name (EN)')
                    ->required(),

                TextInput::make('name.ar')
                    ->label('Name (AR)')
                    ->required(),

                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),

                Select::make('gender')
                    ->label(__('Gender'))
                    ->options([
                        'male' => __('male'),
                        'female' => __('female'),
                    ])
                    ->required(),

                TextInput::make('address.en')
                    ->label('Address (EN)')
                    ->required(),

                TextInput::make('address.ar')
                    ->label('Address (AR)')
                    ->required(),

                TextInput::make('phone')
                    ->tel()
                    ->default(null),

                TextInput::make('age')
                    ->numeric()
                    ->default(null)
                    ->minValue(15)
                    ->maxValue(120),

                Select::make('qualification_id')
                    ->label(__('Qualification'))
                    ->relationship('qualification', 'name')
                    ->getOptionLabelFromRecordUsing(fn ($record) =>
                        $record->getTranslation('name', 'en') . ' / ' . $record->getTranslation('name', 'ar')
                    )
                    ->searchable()
                    ->preload()
                    ->required(),

                Select::make('preferred_type_id')
                    ->label(__('Preferred Type'))
                    ->relationship('preferredType', 'name')
                    ->getOptionLabelFromRecordUsing(fn ($record) =>
                        $record->getTranslation('name', 'en') . ' / ' . $record->getTranslation('name', 'ar')
                    )
                    ->searchable()
                    ->preload()
                    ->required(),

                Toggle::make('photo_consent')
                    ->required(),
            ]);
    }
}
