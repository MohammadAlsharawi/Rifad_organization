<?php

namespace App\Filament\Resources\LastestUpdates;

use App\Filament\Resources\LastestUpdates\Pages\CreateLastestUpdate;
use App\Filament\Resources\LastestUpdates\Pages\EditLastestUpdate;
use App\Filament\Resources\LastestUpdates\Pages\ListLastestUpdates;
use App\Filament\Resources\LastestUpdates\Pages\ViewLastestUpdate;
use App\Filament\Resources\LastestUpdates\Schemas\LastestUpdateForm;
use App\Filament\Resources\LastestUpdates\Schemas\LastestUpdateInfolist;
use App\Filament\Resources\LastestUpdates\Tables\LastestUpdatesTable;
use App\Models\LastestUpdate;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class LastestUpdateResource extends Resource
{
    protected static ?string $model = LastestUpdate::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $recordTitleAttribute = 'LastestUpdate';

    public static function form(Schema $schema): Schema
    {
        return LastestUpdateForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return LastestUpdateInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return LastestUpdatesTable::configure($table);
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
            'index' => ListLastestUpdates::route('/'),
            'create' => CreateLastestUpdate::route('/create'),
            'view' => ViewLastestUpdate::route('/{record}'),
            'edit' => EditLastestUpdate::route('/{record}/edit'),
        ];
    }
}
