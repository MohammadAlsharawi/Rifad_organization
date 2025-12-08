<?php

namespace App\Filament\Resources\Donors;

use App\Filament\Resources\Donors\Pages\CreateDonor;
use App\Filament\Resources\Donors\Pages\EditDonor;
use App\Filament\Resources\Donors\Pages\ListDonors;
use App\Filament\Resources\Donors\Pages\ViewDonor;
use App\Filament\Resources\Donors\RelationManagers\ProjectRelationManager;
use App\Filament\Resources\Donors\Schemas\DonorForm;
use App\Filament\Resources\Donors\Schemas\DonorInfolist;
use App\Filament\Resources\Donors\Tables\DonorsTable;
use App\Models\Donor;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use AlperenErsoy\FilamentExport\Actions\FilamentExportHeaderAction;
use Filament\Actions\BulkActionGroup;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;


class DonorResource extends Resource
{
    protected static ?string $model = Donor::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-gift';

    protected static ?string $recordTitleAttribute = 'Donor';

    public static function form(Schema $schema): Schema
    {
        return DonorForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return DonorInfolist::configure($schema);
    }

    public static function table(Table $table): Table
{
    return $table
         ->searchable(false)
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('email')
                    ->label('Email address')
                    ->searchable(),
                TextColumn::make('phone')
                    ->searchable(),
                TextColumn::make('donated_amount')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('project.title')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                    TextColumn::make('donate')
                    ->label('Donation Type')
                    ->sortable()
                    ->badge()
                    ->colors([
                        'success' => 'monthly',
                        'warning' => 'one_time',
                    ]),
                    TextColumn::make('status')
                        ->badge()
                        ->colors([
                            'warning' => 'pending',
                            'success' => 'success',
                        ])
            ])
        ->actions([
            ViewAction::make(),
            EditAction::make(),
            DeleteAction::make(),

            Action::make('approve')
                ->label('Approve')
                ->icon('heroicon-o-check')
                ->visible(fn ($record) => $record->status === 'pending')
                ->requiresConfirmation()
                ->action(function ($record) {
                    $newSecured = $record->project->secured_amount + $record->donated_amount;
                    if ($newSecured > $record->project->total_amount) {
                        Notification::make()
                            ->title('Donation exceeds project total amount')
                            ->danger()
                            ->send();
                        return;
                    }

                    $record->update(['status' => 'success']);
                    $record->project->update([
                        'secured_amount' => $newSecured,
                    ]);

                    Notification::make()
                        ->title('Donation approved successfully')
                        ->success()
                        ->send();
                }),
        ])
        ->bulkActions([
            DeleteBulkAction::make(),
        ])
        ->headerActions([
                FilamentExportHeaderAction::make('export')
                    ->label('Export')
                    ->fileName('Donors'),
            ])
            ->filters([
                SelectFilter::make('status')
                ->label('Donation Status')
                ->options([
                    'pending' => 'Pending',
                    'success' => 'Success',
                ]),
            Filter::make('name')
                ->form([
                    TextInput::make('value')->label('Name'),
                ])
                ->query(fn($query, array $data) =>
                    $query->when($data['value'], fn($q) =>
                        $q->where('name', 'like', '%' . $data['value'] . '%')
                    )
                ),

            Filter::make('email')
                ->form([
                    TextInput::make('value')->label('Email'),
                ])
                ->query(fn($query, array $data) =>
                    $query->when($data['value'], fn($q) =>
                        $q->where('email', 'like', '%' . $data['value'] . '%')
                    )
                ),

            Filter::make('phone')
                ->form([
                    TextInput::make('value')->label('Phone'),
                ])
                ->query(fn($query, array $data) =>
                    $query->when($data['value'], fn($q) =>
                        $q->where('phone', 'like', '%' . $data['value'] . '%')
                    )
                ),
            Filter::make('donated_amount')
                ->form([
                    TextInput::make('min')->numeric()->label('Min Amount'),
                    TextInput::make('max')->numeric()->label('Max Amount'),
                ])
                ->query(fn($query, array $data) =>
                    $query
                        ->when($data['min'], fn($q) => $q->where('donated_amount', '>=', $data['min']))
                        ->when($data['max'], fn($q) => $q->where('donated_amount', '<=', $data['max']))
                ),

            SelectFilter::make('project_id')
                ->relationship('project', 'title')
                ->label('Project'),

            Filter::make('created_at')
                ->form([
                    DatePicker::make('from')->label('From'),
                    DatePicker::make('until')->label('Until'),
                ])
                ->query(fn($query, array $data) =>
                    $query
                        ->when($data['from'], fn($q) => $q->whereDate('created_at', '>=', $data['from']))
                        ->when($data['until'], fn($q) => $q->whereDate('created_at', '<=', $data['until']))
                ),

            Filter::make('updated_at')
                ->form([
                    DatePicker::make('from')->label('From'),
                    DatePicker::make('until')->label('Until'),
                ])
                ->query(fn($query, array $data) =>
                    $query
                        ->when($data['from'], fn($q) => $q->whereDate('updated_at', '>=', $data['from']))
                        ->when($data['until'], fn($q) => $q->whereDate('updated_at', '<=', $data['until']))
                ),
            SelectFilter::make('donate')
                ->options([
                    'monthly'  => 'Monthly',
                    'one_time' => 'One Time',
                ]),
            ]);
}


    public static function getRelations(): array
    {
        return [
            ProjectRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListDonors::route('/'),
            'create' => CreateDonor::route('/create'),
            'view' => ViewDonor::route('/{record}'),
            'edit' => EditDonor::route('/{record}/edit'),
        ];
    }
}
