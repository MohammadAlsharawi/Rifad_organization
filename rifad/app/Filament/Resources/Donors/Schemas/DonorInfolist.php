<?php

namespace App\Filament\Resources\Donors\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class DonorInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name')
                    ->label(__('Name'))
                    ->getStateUsing(fn ($record) =>
                        $record->getTranslation('name', app()->getLocale())
            ),

                TextEntry::make('email')
                    ->label('Email address'),
                TextEntry::make('phone'),
                TextEntry::make('donated_amount')
                    ->numeric(),
                TextEntry::make('project.title')
                    ->label(__('Project'))
                    ->getStateUsing(fn ($record) =>
                        $record->project?->getTranslation('title', app()->getLocale())
                        ),

                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
                TextEntry::make('donate')
                    ->label(__('Donation Type'))
                    ->badge()
                    ->colors([
                        'monthly'  => 'success',
                        'one_time' => 'warning',
                    ])
                    ->formatStateUsing(fn ($state) => __($state)),


                TextEntry::make('status')
                    ->label(__('Status'))
                    ->badge()
                    ->colors([
                        'pending'  => 'warning',
                        'success'  => 'success',
                        'canceled' => 'danger',
                    ])
                    ->formatStateUsing(fn ($state) => __($state)),

        ]);
    }
}
