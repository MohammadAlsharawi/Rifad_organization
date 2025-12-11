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
                Textarea::make('reason.en')
                    ->label('Reason (EN)')
                    ->required()
                    ->columnSpanFull(),

                Textarea::make('reason.ar')
                    ->label('Reason (AR)')
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
                    ->label(__('Status'))
                    ->options([
                        'completed' => __('completed'),
                        'in_progress' => __('in_progress'),
                        'failed' => __('failed'),
                    ])
                    ->required(),

                Select::make('category')
                    ->label(__('Category'))
                    ->options([
                        'campaigns' => __('campaigns'),
                        'initiative' => __('initiative'),
                    ])
                    ->required(),


                Select::make('organization_id')
                    ->label('Organization')
                    ->relationship('organization', 'name')
                    ->getOptionLabelFromRecordUsing(fn ($record) =>
                        $record->getTranslation('name', 'ar') . ' / ' . $record->getTranslation('name', 'en')
                    )
                    ->searchable()
                    ->preload()
                    ->required(),


            ]);
    }
}
