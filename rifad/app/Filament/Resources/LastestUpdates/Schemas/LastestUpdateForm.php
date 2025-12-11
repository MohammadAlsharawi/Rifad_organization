<?php

namespace App\Filament\Resources\LastestUpdates\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TimePicker;
use Filament\Schemas\Schema;

class LastestUpdateForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
    ->components([
        FileUpload::make('photo')
            ->required()
            ->image()
            ->directory('photos')
            ->maxSize(5000)
            ->imagePreviewHeight('250')
            ->downloadable()
            ->openable(),

        TextInput::make('title.en')
            ->label('Title (EN)')
            ->required(),

        TextInput::make('title.ar')
            ->label('Title (AR)')
            ->required(),

        Textarea::make('description.en')
            ->label('Description (EN)')
            ->required()
            ->columnSpanFull(),

        Textarea::make('description.ar')
            ->label('Description (AR)')
            ->required()
            ->columnSpanFull(),

        DatePicker::make('date')
            ->label('Date')
            ->required(),

        TimePicker::make('time')
            ->label('Time')
            ->required(),
    ]);

    }
}
