<?php

namespace App\Filament\Resources\Projects\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ProjectInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                ImageEntry::make('image')
                ->disk('public'),
                TextEntry::make('title')
                    ->label(__('Title'))
                    ->getStateUsing(fn ($record) =>
                        $record->getTranslation('title', app()->getLocale())
                    ),

                TextEntry::make('description')
                    ->label(__('Description'))
                    ->getStateUsing(fn ($record) =>
                        $record->getTranslation('description', app()->getLocale())
                    ),

                TextEntry::make('reason')
                    ->label(__('Reason'))
                    ->getStateUsing(fn ($record) =>
                        $record->getTranslation('reason', app()->getLocale())
                    ),
                TextEntry::make('total_amount')
                    ->numeric(),
                TextEntry::make('secured_amount')
                    ->numeric(),
                TextEntry::make('status')
                    ->label(__('Status'))
                    ->getStateUsing(fn ($record) => __($record->status)),

                TextEntry::make('category')
                    ->label(__('Category'))
                    ->getStateUsing(fn ($record) => __($record->category)),

                TextEntry::make('organization_id')
                    ->numeric(),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
