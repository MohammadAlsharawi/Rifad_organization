<?php

namespace App\Filament\Resources\Projects\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('image')
                    ->image(),
                TextInput::make('title')
                    ->required()
                    ->regex('/^[\pL\s\-]+$/u'),
                Textarea::make('description')
                    ->required()
                    ->columnSpanFull()
                    ->regex('/^[\pL\s\-]+$/u'),
                Textarea::make('reason')
                    ->required()
                    ->columnSpanFull()
                    ->regex('/^[\pL\s\-]+$/u'),
                TextInput::make('total_amount')
                    ->required()
                    ->numeric(),
                TextInput::make('secured_amount')
                    ->required()
                    ->numeric()
                    ->default(0.0),
                Select::make('organization_id')
                    ->label('Organization')
                    ->relationship('organization', 'name')
                    ->searchable()
                    ->preload()
                    ->required()
            ]);
    }
}
