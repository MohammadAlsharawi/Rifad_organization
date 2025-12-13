<?php

namespace App\Filament\Resources\Challenges;

use App\Filament\Resources\Challenges\Pages\CreateChallenge;
use App\Filament\Resources\Challenges\Pages\EditChallenge;
use App\Filament\Resources\Challenges\Pages\ListChallenges;
use App\Filament\Resources\Challenges\Pages\ViewChallenge;
use App\Filament\Resources\Challenges\Schemas\ChallengeForm;
use App\Filament\Resources\Challenges\Schemas\ChallengeInfolist;
use App\Filament\Resources\Challenges\Tables\ChallengesTable;
use App\Models\Challenge;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ChallengeResource extends Resource
{
    protected static ?string $model = Challenge::class;

    protected static string|BackedEnum|null $navigationIcon ='heroicon-o-exclamation-triangle';

    protected static ?string $recordTitleAttribute = 'Challenge';

    public static function form(Schema $schema): Schema
    {
        return ChallengeForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ChallengeInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ChallengesTable::configure($table);
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
            'index' => ListChallenges::route('/'),
            'create' => CreateChallenge::route('/create'),
            'view' => ViewChallenge::route('/{record}'),
            'edit' => EditChallenge::route('/{record}/edit'),
        ];
    }
}
