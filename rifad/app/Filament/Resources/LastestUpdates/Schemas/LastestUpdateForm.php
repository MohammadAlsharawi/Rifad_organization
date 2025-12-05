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
                    ->required()
                    ->maxSize(5000)
                    ->imagePreviewHeight('250')
                    ->downloadable()
                    ->openable(),

                TextInput::make('title')
                    ->required(),
                Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                DatePicker::make('date')
                    ->required(),
                TimePicker::make('time')
                    ->required(),
            ]);
    }
}
