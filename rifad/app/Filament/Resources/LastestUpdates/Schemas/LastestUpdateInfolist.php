<?php

namespace App\Filament\Resources\LastestUpdates\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class LastestUpdateInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('photo'),
                TextEntry::make('title'),
                TextEntry::make('date')
                    ->date(),
                TextEntry::make('time')
                    ->time(),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
