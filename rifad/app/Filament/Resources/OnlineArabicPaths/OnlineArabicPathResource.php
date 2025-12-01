<?php

namespace App\Filament\Resources\OnlineArabicPaths;

use App\Filament\Resources\OnlineArabicPaths\Pages\CreateOnlineArabicPath;
use App\Filament\Resources\OnlineArabicPaths\Pages\EditOnlineArabicPath;
use App\Filament\Resources\OnlineArabicPaths\Pages\ListOnlineArabicPaths;
use App\Filament\Resources\OnlineArabicPaths\Pages\ViewOnlineArabicPath;
use App\Filament\Resources\OnlineArabicPaths\Schemas\OnlineArabicPathForm;
use App\Filament\Resources\OnlineArabicPaths\Schemas\OnlineArabicPathInfolist;
use App\Filament\Resources\OnlineArabicPaths\Tables\OnlineArabicPathsTable;
use App\Models\OnlineArabicPath;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class OnlineArabicPathResource extends Resource
{
    protected static ?string $model = OnlineArabicPath::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-book-open';

    protected static ?string $recordTitleAttribute = 'OnlineArabicPath';

    public static function form(Schema $schema): Schema
    {
        return OnlineArabicPathForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return OnlineArabicPathInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return OnlineArabicPathsTable::configure($table);
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
            'index' => ListOnlineArabicPaths::route('/'),
            'create' => CreateOnlineArabicPath::route('/create'),
            'view' => ViewOnlineArabicPath::route('/{record}'),
            'edit' => EditOnlineArabicPath::route('/{record}/edit'),
        ];
    }
}
