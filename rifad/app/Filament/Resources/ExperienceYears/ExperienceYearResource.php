<?php

namespace App\Filament\Resources\ExperienceYears;

use App\Filament\Resources\ExperienceYears\Pages\CreateExperienceYear;
use App\Filament\Resources\ExperienceYears\Pages\EditExperienceYear;
use App\Filament\Resources\ExperienceYears\Pages\ListExperienceYears;
use App\Filament\Resources\ExperienceYears\Pages\ViewExperienceYear;
use App\Filament\Resources\ExperienceYears\Schemas\ExperienceYearForm;
use App\Filament\Resources\ExperienceYears\Schemas\ExperienceYearInfolist;
use App\Filament\Resources\ExperienceYears\Tables\ExperienceYearsTable;
use App\Models\ExperienceYear;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ExperienceYearResource extends Resource
{
    protected static ?string $model = ExperienceYear::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-briefcase';

    protected static ?string $recordTitleAttribute = 'ExperienceYear';

    public static function form(Schema $schema): Schema
    {
        return ExperienceYearForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ExperienceYearInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ExperienceYearsTable::configure($table);
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
            'index' => ListExperienceYears::route('/'),
            'create' => CreateExperienceYear::route('/create'),
            'view' => ViewExperienceYear::route('/{record}'),
            'edit' => EditExperienceYear::route('/{record}/edit'),
        ];
    }
}
