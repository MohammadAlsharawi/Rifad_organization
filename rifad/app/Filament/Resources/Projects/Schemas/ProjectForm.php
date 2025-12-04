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
                    ->required(),
                Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('reason')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('total_amount')
                    ->required()
                    ->numeric(),
                TextInput::make('secured_amount')
                    ->required()
                    ->numeric()
                    ->default(0.0),
                Select::make('status')
                    ->options(['completed' => 'Completed', 'in_progress' => 'In progress', 'failed' => 'Failed'])
                    ->default('in_progress')
                    ->required(),
                Select::make('category')
                    ->options(['campaigns' => 'Campaigns', 'initiative' => 'Initiative'])
                    ->required(),
                Select::make('organization_id')
                ->label('Organization')
                ->relationship('organization', 'name')
                ->searchable()
                ->preload()
                ->required(),

            ]);
    }
}
