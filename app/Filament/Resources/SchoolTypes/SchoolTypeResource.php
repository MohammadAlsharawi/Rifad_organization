<?php

namespace App\Filament\Resources\SchoolTypes;

use App\Filament\Resources\SchoolTypes\Pages\CreateSchoolType;
use App\Filament\Resources\SchoolTypes\Pages\EditSchoolType;
use App\Filament\Resources\SchoolTypes\Pages\ListSchoolTypes;
use App\Filament\Resources\SchoolTypes\Pages\ViewSchoolType;
use App\Filament\Resources\SchoolTypes\Schemas\SchoolTypeForm;
use App\Filament\Resources\SchoolTypes\Schemas\SchoolTypeInfolist;
use App\Filament\Resources\SchoolTypes\Tables\SchoolTypesTable;
use App\Models\SchoolType;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SchoolTypeResource extends Resource
{
    protected static ?string $model = SchoolType::class;

    protected static string|BackedEnum|null $navigationIcon ='heroicon-o-building-office';

    protected static ?string $recordTitleAttribute = 'SchoolType';

    public static function form(Schema $schema): Schema
    {
        return SchoolTypeForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return SchoolTypeInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SchoolTypesTable::configure($table);
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
            'index' => ListSchoolTypes::route('/'),
            'create' => CreateSchoolType::route('/create'),
            'view' => ViewSchoolType::route('/{record}'),
            'edit' => EditSchoolType::route('/{record}/edit'),
        ];
    }
}
