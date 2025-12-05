<?php

namespace App\Filament\Resources\JoinUs\Schemas;

use Filament\Actions\Action as ActionsAction;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;
use Filament\Infolists\Components\Actions\Action;
use Filament\Support\Enums\IconSize;

class JoinUsInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name'),
                TextEntry::make('email')
                    ->label('Email address'),
                TextEntry::make('address'),
                TextEntry::make('phone'),
                IconEntry::make('cv')
                    ->label('CV File')
                    ->url(fn ($record) => asset('storage/' . $record->cv))
                    ->icon('heroicon-o-document-text')
                    ->openUrlInNewTab()
                    ->color('success')
                    ->size(IconSize::ExtraLarge),
                IconEntry::make('confirmed')
                    ->boolean(),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
