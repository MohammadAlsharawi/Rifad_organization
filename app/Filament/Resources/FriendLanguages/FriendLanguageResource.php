<?php

namespace App\Filament\Resources\FriendLanguages;

use App\Filament\Resources\FriendLanguages\Pages\CreateFriendLanguage;
use App\Filament\Resources\FriendLanguages\Pages\EditFriendLanguage;
use App\Filament\Resources\FriendLanguages\Pages\ListFriendLanguages;
use App\Filament\Resources\FriendLanguages\Pages\ViewFriendLanguage;
use App\Filament\Resources\FriendLanguages\Schemas\FriendLanguageForm;
use App\Filament\Resources\FriendLanguages\Schemas\FriendLanguageInfolist;
use App\Filament\Resources\FriendLanguages\Tables\FriendLanguagesTable;
use App\Models\FriendLanguage;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class FriendLanguageResource extends Resource
{
    protected static ?string $model = FriendLanguage::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-globe-alt';

    protected static ?string $recordTitleAttribute = 'FriendLanguage';

    public static function form(Schema $schema): Schema
    {
        return FriendLanguageForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return FriendLanguageInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FriendLanguagesTable::configure($table);
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
            'index' => ListFriendLanguages::route('/'),
            'create' => CreateFriendLanguage::route('/create'),
            'view' => ViewFriendLanguage::route('/{record}'),
            'edit' => EditFriendLanguage::route('/{record}/edit'),
        ];
    }
}
