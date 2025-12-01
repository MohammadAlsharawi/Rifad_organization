<?php

namespace App\Filament\Resources\HomeLanguages;

use App\Filament\Resources\HomeLanguages\Pages\CreateHomeLanguage;
use App\Filament\Resources\HomeLanguages\Pages\EditHomeLanguage;
use App\Filament\Resources\HomeLanguages\Pages\ListHomeLanguages;
use App\Filament\Resources\HomeLanguages\Pages\ViewHomeLanguage;
use App\Filament\Resources\HomeLanguages\Schemas\HomeLanguageForm;
use App\Filament\Resources\HomeLanguages\Schemas\HomeLanguageInfolist;
use App\Filament\Resources\HomeLanguages\Tables\HomeLanguagesTable;
use App\Models\HomeLanguage;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class HomeLanguageResource extends Resource
{
    protected static ?string $model = HomeLanguage::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-globe-alt';

    protected static ?string $recordTitleAttribute = 'HomeLanguage';

    public static function form(Schema $schema): Schema
    {
        return HomeLanguageForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return HomeLanguageInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return HomeLanguagesTable::configure($table);
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
            'index' => ListHomeLanguages::route('/'),
            'create' => CreateHomeLanguage::route('/create'),
            'view' => ViewHomeLanguage::route('/{record}'),
            'edit' => EditHomeLanguage::route('/{record}/edit'),
        ];
    }
}
