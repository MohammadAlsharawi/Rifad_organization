<?php

namespace App\Filament\Resources\ParentReasons;

use App\Filament\Resources\ParentReasons\Pages\CreateParentReason;
use App\Filament\Resources\ParentReasons\Pages\EditParentReason;
use App\Filament\Resources\ParentReasons\Pages\ListParentReasons;
use App\Filament\Resources\ParentReasons\Pages\ViewParentReason;
use App\Filament\Resources\ParentReasons\Schemas\ParentReasonForm;
use App\Filament\Resources\ParentReasons\Schemas\ParentReasonInfolist;
use App\Filament\Resources\ParentReasons\Tables\ParentReasonsTable;
use App\Models\ParentReason;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ParentReasonResource extends Resource
{
    protected static ?string $model = ParentReason::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $recordTitleAttribute = 'ParentReason';

    public static function form(Schema $schema): Schema
    {
        return ParentReasonForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ParentReasonInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ParentReasonsTable::configure($table);
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
            'index' => ListParentReasons::route('/'),
            'create' => CreateParentReason::route('/create'),
            'view' => ViewParentReason::route('/{record}'),
            'edit' => EditParentReason::route('/{record}/edit'),
        ];
    }
}
