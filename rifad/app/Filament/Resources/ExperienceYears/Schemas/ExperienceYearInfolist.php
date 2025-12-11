<?php

namespace App\Filament\Resources\ExperienceYears\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ExperienceYearInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name')
                    ->label(__('Experience Year'))
                    ->getStateUsing(fn ($record) =>
                        $record->getTranslation('name', app()->getLocale())
                            ),

                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
