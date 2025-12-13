<?php

namespace App\Filament\Resources\Volunteerings;

use App\Filament\Resources\Volunteerings\Pages\CreateVolunteering;
use App\Filament\Resources\Volunteerings\Pages\EditVolunteering;
use App\Filament\Resources\Volunteerings\Pages\ListVolunteerings;
use App\Filament\Resources\Volunteerings\Pages\ViewVolunteering;
use App\Filament\Resources\Volunteerings\Schemas\VolunteeringForm;
use App\Filament\Resources\Volunteerings\Schemas\VolunteeringInfolist;
use App\Filament\Resources\Volunteerings\Tables\VolunteeringsTable;
use App\Models\Volunteering;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class VolunteeringResource extends Resource
{
    protected static ?string $model = Volunteering::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $recordTitleAttribute = 'Volunteering';

    public static function form(Schema $schema): Schema
    {
        return VolunteeringForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return VolunteeringInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return VolunteeringsTable::configure($table);
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
            'index' => ListVolunteerings::route('/'),
            'create' => CreateVolunteering::route('/create'),
            'view' => ViewVolunteering::route('/{record}'),
            'edit' => EditVolunteering::route('/{record}/edit'),
        ];
    }
}
