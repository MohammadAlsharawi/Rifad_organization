<?php

namespace App\Filament\Resources\Donors\Schemas;

use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class DonorForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name.en')
                    ->label('Donor name (EN)')
                    ->required(),

                TextInput::make('name.ar')
                    ->label('Donor name (AR)')
                    ->required(),

                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->default(null),
                TextInput::make('phone')
                    ->tel()
                    ->default(null),
                TextInput::make('donated_amount')
                    ->required()
                    ->numeric(),
                Select::make('project_id')
                    ->label(__('Project'))
                    ->relationship('project', 'title')
                    ->searchable()
                    ->required()
                    ->preload()
                    ->rules(['exists:projects,id'])
                    ->getOptionLabelFromRecordUsing(fn ($record) => $record->getTranslation('title', app()->getLocale())),

                Radio::make('donate')
                    ->label(__('Donate Type'))
                    ->options([
                        'monthly'  => __('monthly'),
                        'one_time' => __('one_time'),
                    ])
                    ->required(),
                Select::make('status')
                    ->label(__('Status'))
                    ->options([
                        'pending' => __('pending'),
                        'success' => __('success'),
                        'canceled' => __('canceled'),
                    ])
                    ->default('pending'),

            ]);
    }
}
