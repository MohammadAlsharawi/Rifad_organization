<?php

namespace App\Filament\Resources\ITeachForSyrias\Tables;

use AlperenErsoy\FilamentExport\Actions\FilamentExportHeaderAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class ITeachForSyriasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->searchable(false)
            ->columns([
                // الاسم باللغتين
                TextColumn::make('full_name')
                    ->label(__('Full Name'))
                    ->getStateUsing(fn ($record) =>
                        $record->getTranslation('full_name', 'en') . ' / ' . $record->getTranslation('full_name', 'ar')
                    )
                    ->searchable(),

                // الهاتف
                TextColumn::make('phone')
                    ->label(__('Phone'))
                    ->searchable(),

                // البريد الإلكتروني
                TextColumn::make('email')
                    ->label(__('Email address'))
                    ->searchable(),

                // مكان الإقامة باللغتين
                TextColumn::make('residence')
                    ->label(__('Residence'))
                    ->getStateUsing(fn ($record) =>
                        $record->getTranslation('residence', 'en') . ' / ' . $record->getTranslation('residence', 'ar')
                    )
                    ->searchable(),

                // سنة الميلاد
                TextColumn::make('birth_year')
                    ->label(__('Birth Year'))
                    ->sortable(),

                // الدرجة العلمية باللغتين
                TextColumn::make('degree.name')
                    ->label(__('Degree'))
                    ->getStateUsing(fn ($record) =>
                        $record->degree?->getTranslation('name', 'en') . ' / ' . $record->degree?->getTranslation('name', 'ar')
                    )
                    ->sortable(),

                // القطاع باللغتين
                TextColumn::make('sector.name')
                    ->label(__('Sector'))
                    ->getStateUsing(fn ($record) =>
                        $record->sector?->getTranslation('name', 'en') . ' / ' . $record->sector?->getTranslation('name', 'ar')
                    )
                    ->sortable(),

                // سنوات الخبرة باللغتين
                TextColumn::make('experienceYear.name')
                    ->label(__('Experience Years'))
                    ->getStateUsing(fn ($record) =>
                        $record->experienceYear?->getTranslation('name', 'en') . ' / ' . $record->experienceYear?->getTranslation('name', 'ar')
                    )
                    ->sortable(),

                // نوع التدريب باللغتين
                TextColumn::make('trainingType.name')
                    ->label(__('Training Type'))
                    ->getStateUsing(fn ($record) =>
                        $record->trainingType?->getTranslation('name', 'en') . ' / ' . $record->trainingType?->getTranslation('name', 'ar')
                    )
                    ->sortable(),

                // الحاجة باللغتين
                TextColumn::make('need.name')
                    ->label(__('Need'))
                    ->getStateUsing(fn ($record) =>
                        $record->need?->getTranslation('name', 'en') . ' / ' . $record->need?->getTranslation('name', 'ar')
                    )
                    ->sortable(),

                // الدورة باللغتين
                TextColumn::make('course.name')
                    ->label(__('Course'))
                    ->getStateUsing(fn ($record) =>
                        $record->course?->getTranslation('name', 'en') . ' / ' . $record->course?->getTranslation('name', 'ar')
                    )
                    ->sortable(),

                // تأكيد
                IconColumn::make('confirmed')
                    ->label(__('Confirmed'))
                    ->boolean(),
            ])

            ->headerActions([
                FilamentExportHeaderAction::make('export')
                    ->label('Export')
                    ->fileName('ITeachFroSyria'),
            ])
            ->filters([
                SelectFilter::make('gender')
                    ->options([
                        'male' => 'Male',
                        'female' => 'Female',
                    ]),

                TernaryFilter::make('confirmed')
                    ->label('Confirmed')
                    ->trueLabel('Confirmed')
                    ->falseLabel('Not Confirmed'),

                SelectFilter::make('degree_id')
                    ->relationship('degree', 'name')
                    ->label('Degree'),

                SelectFilter::make('sector_id')
                    ->relationship('sector', 'name')
                    ->label('Sector'),

                SelectFilter::make('experience_year_id')
                    ->relationship('experienceYear', 'name')
                    ->label('Experience Years'),

                SelectFilter::make('training_type_id')
                    ->relationship('trainingType', 'name')
                    ->label('Training Type'),

                SelectFilter::make('need_id')
                    ->relationship('need', 'name')
                    ->label('Need'),

                SelectFilter::make('course_id')
                    ->relationship('course', 'name')
                    ->label('Course'),

                Filter::make('created_at')
                    ->form([
                        DatePicker::make('from')->label('From'),
                        DatePicker::make('until')->label('Until'),
                    ])
                    ->query(function ($query, array $data) {
                        return $query
                            ->when($data['from'], fn($q) => $q->whereDate('created_at', '>=', $data['from']))
                            ->when($data['until'], fn($q) => $q->whereDate('created_at', '<=', $data['until']));
                    }),
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
