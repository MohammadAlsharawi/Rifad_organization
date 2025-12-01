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
                TextInput::make('name')
                    ->required()
                    ->regex('/^[\pL\s\-]+$/u'),
            ]);
    }
}
