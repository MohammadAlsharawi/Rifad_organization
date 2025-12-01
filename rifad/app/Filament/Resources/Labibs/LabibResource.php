<?php

namespace App\Filament\Resources\Labibs;

use App\Filament\Resources\Labibs\Pages\CreateLabib;
use App\Filament\Resources\Labibs\Pages\EditLabib;
use App\Filament\Resources\Labibs\Pages\ListLabibs;
use App\Filament\Resources\Labibs\Pages\ViewLabib;
use App\Filament\Resources\Labibs\Schemas\LabibForm;
use App\Filament\Resources\Labibs\Schemas\LabibInfolist;
use App\Filament\Resources\Labibs\Tables\LabibsTable;
use App\Models\Labib;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class LabibResource extends Resource
{
    protected static ?string $model = Labib::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-book-open';

    protected static ?string $recordTitleAttribute = 'Labib';

    public static function form(Schema $schema): Schema
    {
        return LabibForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return LabibInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return LabibsTable::configure($table);
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
            'index' => ListLabibs::route('/'),
            'create' => CreateLabib::route('/create'),
            'view' => ViewLabib::route('/{record}'),
            'edit' => EditLabib::route('/{record}/edit'),
        ];
    }
}
