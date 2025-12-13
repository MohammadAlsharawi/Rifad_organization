<?php

namespace App\Filament\Resources\CourseNames;

use App\Filament\Resources\CourseNames\Pages\CreateCourseName;
use App\Filament\Resources\CourseNames\Pages\EditCourseName;
use App\Filament\Resources\CourseNames\Pages\ListCourseNames;
use App\Filament\Resources\CourseNames\Pages\ViewCourseName;
use App\Filament\Resources\CourseNames\Schemas\CourseNameForm;
use App\Filament\Resources\CourseNames\Schemas\CourseNameInfolist;
use App\Filament\Resources\CourseNames\Tables\CourseNamesTable;
use App\Models\CourseName;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CourseNameResource extends Resource
{
    protected static ?string $model = CourseName::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-clipboard-document-list';

    protected static ?string $recordTitleAttribute = 'CourseName';

    public static function form(Schema $schema): Schema
    {
        return CourseNameForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return CourseNameInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CourseNamesTable::configure($table);
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
            'index' => ListCourseNames::route('/'),
            'create' => CreateCourseName::route('/create'),
            'view' => ViewCourseName::route('/{record}'),
            'edit' => EditCourseName::route('/{record}/edit'),
        ];
    }
}
