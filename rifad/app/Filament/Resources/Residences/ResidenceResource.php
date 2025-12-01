<?php

namespace App\Filament\Resources\Residences;

use App\Filament\Resources\Residences\Pages\CreateResidence;
use App\Filament\Resources\Residences\Pages\EditResidence;
use App\Filament\Resources\Residences\Pages\ListResidences;
use App\Filament\Resources\Residences\Pages\ViewResidence;
use App\Filament\Resources\Residences\Schemas\ResidenceForm;
use App\Filament\Resources\Residences\Schemas\ResidenceInfolist;
use App\Filament\Resources\Residences\Tables\ResidencesTable;
use App\Models\Residence;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ResidenceResource extends Resource
{
    protected static ?string $model = Residence::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-building-office';

    protected static ?string $recordTitleAttribute = 'Residence';

    public static function form(Schema $schema): Schema
    {
        return ResidenceForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ResidenceInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ResidencesTable::configure($table);
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
            'index' => ListResidences::route('/'),
            'create' => CreateResidence::route('/create'),
            'view' => ViewResidence::route('/{record}'),
            'edit' => EditResidence::route('/{record}/edit'),
        ];
    }
}
