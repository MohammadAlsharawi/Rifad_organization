<?php

namespace App\Filament\Resources\SpeaksArabics;

use App\Filament\Resources\SpeaksArabics\Pages\CreateSpeaksArabic;
use App\Filament\Resources\SpeaksArabics\Pages\EditSpeaksArabic;
use App\Filament\Resources\SpeaksArabics\Pages\ListSpeaksArabics;
use App\Filament\Resources\SpeaksArabics\Pages\ViewSpeaksArabic;
use App\Filament\Resources\SpeaksArabics\Schemas\SpeaksArabicForm;
use App\Filament\Resources\SpeaksArabics\Schemas\SpeaksArabicInfolist;
use App\Filament\Resources\SpeaksArabics\Tables\SpeaksArabicsTable;
use App\Models\SpeaksArabic;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SpeaksArabicResource extends Resource
{
    protected static ?string $model = SpeaksArabic::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-chat-bubble-left-right';

    protected static ?string $recordTitleAttribute = 'SpeaksArabic';

    public static function form(Schema $schema): Schema
    {
        return SpeaksArabicForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return SpeaksArabicInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SpeaksArabicsTable::configure($table);
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
            'index' => ListSpeaksArabics::route('/'),
            'create' => CreateSpeaksArabic::route('/create'),
            'view' => ViewSpeaksArabic::route('/{record}'),
            'edit' => EditSpeaksArabic::route('/{record}/edit'),
        ];
    }
}
