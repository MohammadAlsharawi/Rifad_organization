<?php

namespace App\Filament\Resources\OnlineArabicPaths\Tables;

use AlperenErsoy\FilamentExport\Actions\FilamentExportHeaderAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class OnlineArabicPathsTable
{
    public static function configure(Table $table): Table
    {
        return $table
        ->searchable(false)
        ->columns([
            TextColumn::make('full_name')
                ->label(__('Full Name'))
                ->getStateUsing(fn ($record) =>
                    $record->getTranslation('full_name', app()->getLocale())
                )
                ->searchable(),
            TextColumn::make('birth_date')
                ->date()
                ->sortable(),
            TextColumn::make('gender'),
            TextColumn::make('grade')
                ->searchable(),

            TextColumn::make('parent_name')
                ->label(__('Parent Name'))
                ->getStateUsing(fn ($record) =>
                    $record->getTranslation('parent_name', app()->getLocale())
                )
                ->searchable(),
            TextColumn::make('origin_country')
                ->label(__('Origin Country'))
                ->getStateUsing(fn ($record) =>
                    $record->getTranslation('origin_country', app()->getLocale())
                )
                ->searchable(),

            TextColumn::make('residence_country')
                ->label(__('Residence Country'))
                ->getStateUsing(fn ($record) =>
                    $record->getTranslation('residence_country', app()->getLocale())
                )
                ->searchable(),
            TextColumn::make('phone')
                ->searchable(),
            TextColumn::make('email')
                ->label('Email address')
                ->searchable(),

            // ✅ Relations instead of numeric IDs
            TextColumn::make('speaksArabic.name')->label('Speaks Arabic'),
            TextColumn::make('readingLevel.name')->label('Reading Level'),
            TextColumn::make('homeLanguage.name')->label('Home Language'),
            TextColumn::make('friendsLanguage.name')->label('Friends Language'),
            TextColumn::make('schoolType.name')->label('School Type'),
            TextColumn::make('preferredSections.name')->label('Preferred Sections'),
            TextColumn::make('biggestChallenge.name')->label('Biggest Challenge'),
            TextColumn::make('parentReason.name')->label('Parent Reason'),
            TextColumn::make('preferredTime.name')->label('Preferred Time'),

            IconColumn::make('has_difficulty')->boolean(),
            TextColumn::make('how_found_us')->searchable(),
            IconColumn::make('confirmed')->boolean(),

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
                    ->fileName('OnlineArabicPath'),
            ])
        ->filters([
            Filter::make('full_name')
                ->form([TextInput::make('value')->label('Full Name')])
                ->query(fn($query, $data) => $query->when($data['value'], fn($q) => $q->where('full_name', 'like', "%{$data['value']}%"))),

            Filter::make('email')
                ->form([TextInput::make('value')->label('Email')])
                ->query(fn($query, $data) => $query->when($data['value'], fn($q) => $q->where('email', 'like', "%{$data['value']}%"))),

            Filter::make('phone')
                ->form([TextInput::make('value')->label('Phone')])
                ->query(fn($query, $data) => $query->when($data['value'], fn($q) => $q->where('phone', 'like', "%{$data['value']}%"))),

            Filter::make('origin_country')
                ->form([TextInput::make('value')->label('Origin Country')])
                ->query(fn($query, $data) => $query->when($data['value'], fn($q) => $q->where('origin_country', 'like', "%{$data['value']}%"))),

            Filter::make('residence_country')
                ->form([TextInput::make('value')->label('Residence Country')])
                ->query(fn($query, $data) => $query->when($data['value'], fn($q) => $q->where('residence_country', 'like', "%{$data['value']}%"))),

            SelectFilter::make('speaks_arabic_id')->relationship('speaksArabic', 'name'),
            SelectFilter::make('reading_level_id')->relationship('readingLevel', 'name'),
            SelectFilter::make('home_language_id')->relationship('homeLanguage', 'name'),
            SelectFilter::make('friends_language_id')->relationship('friendLanguage', 'name'),
            SelectFilter::make('school_type_id')->relationship('schoolType', 'name'),
            SelectFilter::make('preferred_sections_id')->relationship('preferredSection', 'name'),
            SelectFilter::make('biggest_challenge_id')->relationship('biggestChallenge', 'name'),
            SelectFilter::make('parent_reason_id')->relationship('parentReason', 'name'),
            SelectFilter::make('preferred_time_id')->relationship('preferredTime', 'name'),

            TernaryFilter::make('has_difficulty')->label('Has Difficulty'),
            TernaryFilter::make('confirmed')->label('Confirmed'),

            Filter::make('created_at')
                ->form([
                    DatePicker::make('from')->label('From'),
                    DatePicker::make('until')->label('Until'),
                ])
                ->query(fn($query, $data) =>
                    $query
                        ->when($data['from'], fn($q) => $q->whereDate('created_at', '>=', $data['from']))
                        ->when($data['until'], fn($q) => $q->whereDate('created_at', '<=', $data['until']))
                ),

            Filter::make('updated_at')
                ->form([
                    DatePicker::make('from')->label('From'),
                    DatePicker::make('until')->label('Until'),
                ])
                ->query(fn($query, $data) =>
                    $query
                        ->when($data['from'], fn($q) => $q->whereDate('updated_at', '>=', $data['from']))
                        ->when($data['until'], fn($q) => $q->whereDate('updated_at', '<=', $data['until']))
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
