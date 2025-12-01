<?php

namespace App\Filament\Resources\PreferredSections;

use App\Filament\Resources\PreferredSections\Pages\CreatePreferredSection;
use App\Filament\Resources\PreferredSections\Pages\EditPreferredSection;
use App\Filament\Resources\PreferredSections\Pages\ListPreferredSections;
use App\Filament\Resources\PreferredSections\Pages\ViewPreferredSection;
use App\Filament\Resources\PreferredSections\Schemas\PreferredSectionForm;
use App\Filament\Resources\PreferredSections\Schemas\PreferredSectionInfolist;
use App\Filament\Resources\PreferredSections\Tables\PreferredSectionsTable;
use App\Models\PreferredSection;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PreferredSectionResource extends Resource
{
    protected static ?string $model = PreferredSection::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-check-circle';

    protected static ?string $recordTitleAttribute = 'PreferredSection';

    public static function form(Schema $schema): Schema
    {
        return PreferredSectionForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return PreferredSectionInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PreferredSectionsTable::configure($table);
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
            'index' => ListPreferredSections::route('/'),
            'create' => CreatePreferredSection::route('/create'),
            'view' => ViewPreferredSection::route('/{record}'),
            'edit' => EditPreferredSection::route('/{record}/edit'),
        ];
    }
}
