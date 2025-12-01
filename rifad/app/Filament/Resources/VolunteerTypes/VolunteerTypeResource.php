<?php

namespace App\Filament\Resources\VolunteerTypes;

use App\Filament\Resources\VolunteerTypes\Pages\CreateVolunteerType;
use App\Filament\Resources\VolunteerTypes\Pages\EditVolunteerType;
use App\Filament\Resources\VolunteerTypes\Pages\ListVolunteerTypes;
use App\Filament\Resources\VolunteerTypes\Pages\ViewVolunteerType;
use App\Filament\Resources\VolunteerTypes\Schemas\VolunteerTypeForm;
use App\Filament\Resources\VolunteerTypes\Schemas\VolunteerTypeInfolist;
use App\Filament\Resources\VolunteerTypes\Tables\VolunteerTypesTable;
use App\Models\VolunteerType;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class VolunteerTypeResource extends Resource
{
    protected static ?string $model = VolunteerType::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $recordTitleAttribute = 'VolunteerType';

    public static function form(Schema $schema): Schema
    {
        return VolunteerTypeForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return VolunteerTypeInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return VolunteerTypesTable::configure($table);
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
            'index' => ListVolunteerTypes::route('/'),
            'create' => CreateVolunteerType::route('/create'),
            'view' => ViewVolunteerType::route('/{record}'),
            'edit' => EditVolunteerType::route('/{record}/edit'),
        ];
    }
}
