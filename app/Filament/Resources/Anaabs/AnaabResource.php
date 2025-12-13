<?php

namespace App\Filament\Resources\Anaabs;

use App\Filament\Resources\Anaabs\Pages\CreateAnaab;
use App\Filament\Resources\Anaabs\Pages\EditAnaab;
use App\Filament\Resources\Anaabs\Pages\ListAnaabs;
use App\Filament\Resources\Anaabs\Pages\ViewAnaab;
use App\Filament\Resources\Anaabs\Schemas\AnaabForm;
use App\Filament\Resources\Anaabs\Schemas\AnaabInfolist;
use App\Filament\Resources\Anaabs\Tables\AnaabsTable;
use App\Models\Anaab;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class AnaabResource extends Resource
{
    protected static ?string $model = Anaab::class;

    protected static string|BackedEnum|null $navigationIcon ='heroicon-o-presentation-chart-bar';

    protected static ?string $recordTitleAttribute = 'Anaab';

    public static function form(Schema $schema): Schema
    {
        return AnaabForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return AnaabInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AnaabsTable::configure($table);
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
            'index' => ListAnaabs::route('/'),
            'create' => CreateAnaab::route('/create'),
            'view' => ViewAnaab::route('/{record}'),
            'edit' => EditAnaab::route('/{record}/edit'),
        ];
    }
}
