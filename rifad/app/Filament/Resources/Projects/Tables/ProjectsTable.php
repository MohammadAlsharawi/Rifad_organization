<?php

namespace App\Filament\Resources\Projects\Tables;

use AlperenErsoy\FilamentExport\Actions\FilamentExportHeaderAction;
use App\Models\Project;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Spatie\SimpleExcel\SimpleExcelWriter;

class ProjectsTable
{
    public static function configure(Table $table): Table
    {
        return $table
        ->searchable(false)
        ->columns([
        ImageColumn::make('image'),

        TextColumn::make('title')
            ->label(__('Title'))
            ->getStateUsing(fn ($record) =>
                $record->getTranslation('title', app()->getLocale())
            )
            ->searchable(),

        TextColumn::make('total_amount')
            ->numeric()
            ->sortable(),

        TextColumn::make('secured_amount')
            ->numeric()
            ->sortable(),

        TextColumn::make('status')
            ->label(__('Status'))
            ->getStateUsing(fn ($record) =>
                $record->getTranslation('status', app()->getLocale())
            ),

        TextColumn::make('status')
            ->label(__('Status'))
            ->getStateUsing(fn ($record) => __($record->status)),

        TextColumn::make('category')
            ->label(__('Category'))
            ->getStateUsing(fn ($record) => __($record->category)),



        TextColumn::make('organization.name')
            ->label('organization')
            ->searchable()
            ->sortable(),

        TextColumn::make('created_at')
            ->dateTime()
            ->sortable()
            ->toggleable(isToggledHiddenByDefault: true),

        TextColumn::make('updated_at')
            ->dateTime()
            ->sortable()
            ->toggleable(isToggledHiddenByDefault: true),
    ])
    ->headerActions([
                FilamentExportHeaderAction::make('export')
                    ->label('Export')
                    ->fileName('projects'),
    ])
    ->filters([
        Filter::make('title')
            ->form([
                TextInput::make('title')->label('Title contains'),
            ])
            ->query(fn ($query, $data) => $query->when(
                $data['title'],
                fn ($q, $value) => $q->where('title', 'like', "%{$value}%")
            )),

        Filter::make('total_amount')
            ->form([
                TextInput::make('min_total')->numeric()->label('Min total'),
                TextInput::make('max_total')->numeric()->label('Max total'),
            ])
            ->query(fn ($query, $data) => $query
                ->when($data['min_total'], fn ($q, $val) => $q->where('total_amount', '>=', $val))
                ->when($data['max_total'], fn ($q, $val) => $q->where('total_amount', '<=', $val))
            ),

        Filter::make('secured_amount')
            ->form([
                TextInput::make('min_secured')->numeric()->label('Min secured'),
                TextInput::make('max_secured')->numeric()->label('Max secured'),
            ])
            ->query(fn ($query, $data) => $query
                ->when($data['min_secured'], fn ($q, $val) => $q->where('secured_amount', '>=', $val))
                ->when($data['max_secured'], fn ($q, $val) => $q->where('secured_amount', '<=', $val))
            ),

        SelectFilter::make('status')
            ->options([
                'completed' => 'Completed',
                'in_progress' => 'In Progress',
                'failed' => 'Failed',
            ]),

        Filter::make('category')
            ->form([
                TextInput::make('category')->label('Category contains'),
            ])
            ->query(fn ($query, $data) => $query->when(
                $data['category'],
                fn ($q, $val) => $q->where('category', 'like', "%{$val}%")
            )),

        SelectFilter::make('organization_id')
            ->relationship('organization', 'name')
            ->label('Organization'),

        Filter::make('created_at')
            ->form([
                DatePicker::make('created_from')->label('Created from'),
                DatePicker::make('created_until')->label('Created until'),
            ])
            ->query(fn ($query, $data) => $query
                ->when($data['created_from'], fn ($q, $date) => $q->whereDate('created_at', '>=', $date))
                ->when($data['created_until'], fn ($q, $date) => $q->whereDate('created_at', '<=', $date))
            ),

        Filter::make('updated_at')
            ->form([
                DatePicker::make('updated_from')->label('Updated from'),
                DatePicker::make('updated_until')->label('Updated until'),
            ])
            ->query(fn ($query, $data) => $query
                ->when($data['updated_from'], fn ($q, $date) => $q->whereDate('updated_at', '>=', $date))
                ->when($data['updated_until'], fn ($q, $date) => $q->whereDate('updated_at', '<=', $date))
            ),
    ])

            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
