<?php

namespace App\Filament\Resources\CourseNames\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class CourseNameForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name.en')
                    ->label('Course Name (EN)')
                    ->required(),

                TextInput::make('name.ar')
                    ->label('Course Name (AR)')
                    ->required()
            ]);
    }
}
