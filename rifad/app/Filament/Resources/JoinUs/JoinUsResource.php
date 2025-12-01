<?php

namespace App\Filament\Resources\JoinUs;

use App\Filament\Resources\JoinUs\Pages\CreateJoinUs;
use App\Filament\Resources\JoinUs\Pages\EditJoinUs;
use App\Filament\Resources\JoinUs\Pages\ListJoinUs;
use App\Filament\Resources\JoinUs\Pages\ViewJoinUs;
use App\Filament\Resources\JoinUs\Schemas\JoinUsForm;
use App\Filament\Resources\JoinUs\Schemas\JoinUsInfolist;
use App\Filament\Resources\JoinUs\Tables\JoinUsTable;
use App\Models\JoinUs;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class JoinUsResource extends Resource
{
    protected static ?string $model = JoinUs::class;

    protected static string|BackedEnum|null $navigationIcon ='heroicon-o-user-plus';

    protected static ?string $recordTitleAttribute = 'JoinUs';

    public static function form(Schema $schema): Schema
    {
        return JoinUsForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return JoinUsInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return JoinUsTable::configure($table);
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
            'index' => ListJoinUs::route('/'),
            'create' => CreateJoinUs::route('/create'),
            'view' => ViewJoinUs::route('/{record}'),
            'edit' => EditJoinUs::route('/{record}/edit'),
        ];
    }
}
