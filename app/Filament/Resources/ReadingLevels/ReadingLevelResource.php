<?php

namespace App\Filament\Resources\ReadingLevels;

use App\Filament\Resources\ReadingLevels\Pages\CreateReadingLevel;
use App\Filament\Resources\ReadingLevels\Pages\EditReadingLevel;
use App\Filament\Resources\ReadingLevels\Pages\ListReadingLevels;
use App\Filament\Resources\ReadingLevels\Pages\ViewReadingLevel;
use App\Filament\Resources\ReadingLevels\Schemas\ReadingLevelForm;
use App\Filament\Resources\ReadingLevels\Schemas\ReadingLevelInfolist;
use App\Filament\Resources\ReadingLevels\Tables\ReadingLevelsTable;
use App\Models\ReadingLevel;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ReadingLevelResource extends Resource
{
    protected static ?string $model = ReadingLevel::class;

    protected static string|BackedEnum|null $navigationIcon =  'heroicon-o-book-open';

    protected static ?string $recordTitleAttribute = 'ReadingLevel';

    public static function form(Schema $schema): Schema
    {
        return ReadingLevelForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ReadingLevelInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ReadingLevelsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListReadingLevels::route('/'),
            'create' => CreateReadingLevel::route('/create'),
            'view' => ViewReadingLevel::route('/{record}'),
            'edit' => EditReadingLevel::route('/{record}/edit'),
        ];
    }
}
