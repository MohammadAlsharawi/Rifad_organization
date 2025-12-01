<?php

namespace App\Filament\Resources\ITeachForSyrias;

use App\Filament\Resources\ITeachForSyrias\Pages\CreateITeachForSyria;
use App\Filament\Resources\ITeachForSyrias\Pages\EditITeachForSyria;
use App\Filament\Resources\ITeachForSyrias\Pages\ListITeachForSyrias;
use App\Filament\Resources\ITeachForSyrias\Pages\ViewITeachForSyria;
use App\Filament\Resources\ITeachForSyrias\Schemas\ITeachForSyriaForm;
use App\Filament\Resources\ITeachForSyrias\Schemas\ITeachForSyriaInfolist;
use App\Filament\Resources\ITeachForSyrias\Tables\ITeachForSyriasTable;
use App\Models\ITeachForSyria;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ITeachForSyriaResource extends Resource
{
    protected static ?string $model = ITeachForSyria::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-presentation-chart-bar';

    protected static ?string $recordTitleAttribute = 'ITeachForSyria';

    public static function form(Schema $schema): Schema
    {
        return ITeachForSyriaForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ITeachForSyriaInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ITeachForSyriasTable::configure($table);
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
            'index' => ListITeachForSyrias::route('/'),
            'create' => CreateITeachForSyria::route('/create'),
            'view' => ViewITeachForSyria::route('/{record}'),
            'edit' => EditITeachForSyria::route('/{record}/edit'),
        ];
    }
}
