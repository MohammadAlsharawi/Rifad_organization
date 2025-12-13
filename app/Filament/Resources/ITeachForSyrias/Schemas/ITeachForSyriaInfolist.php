<?php

namespace App\Filament\Resources\ITeachForSyrias\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;

class ITeachForSyriaInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
        ->components([
            // الاسم باللغتين
            TextEntry::make('full_name')
                ->label(__('Full Name'))
                ->getStateUsing(fn ($record) =>
                    $record->getTranslation('full_name', 'en') . ' / ' . $record->getTranslation('full_name', 'ar')
                ),

            // الهاتف
            TextEntry::make('phone')
                ->label(__('Phone')),

            // البريد الإلكتروني
            TextEntry::make('email')
                ->label(__('Email address')),

            // مكان الإقامة باللغتين
            TextEntry::make('residence')
                ->label(__('Residence'))
                ->getStateUsing(fn ($record) =>
                    $record->getTranslation('residence', 'en') . ' / ' . $record->getTranslation('residence', 'ar')
                ),

            // سنة الميلاد
            TextEntry::make('birth_year')
                ->label(__('Birth Year')),

            // الجنس باللغتين
            TextEntry::make('gender')
                ->label(__('Gender'))
                ->badge()
                ->colors([
                    'male'   => 'success',
                    'female' => 'warning',
                ])
                ->formatStateUsing(fn ($state) => match ($state) {
                    'male'   => 'Male / ذكر',
                    'female' => 'Female / أنثى',
                    default  => '-',
                }),
            // الدرجة العلمية باللغتين
            TextEntry::make('degree.name')
                ->label(__('Degree'))
                ->getStateUsing(fn ($record) =>
                    $record->degree?->getTranslation('name', 'en') . ' / ' . $record->degree?->getTranslation('name', 'ar')
                ),

            // القطاع باللغتين
            TextEntry::make('sector.name')
                ->label(__('Sector'))
                ->getStateUsing(fn ($record) =>
                    $record->sector?->getTranslation('name', 'en') . ' / ' . $record->sector?->getTranslation('name', 'ar')
                ),

            // سنوات الخبرة باللغتين
            TextEntry::make('experienceYear.name')
                ->label(__('Experience Years'))
                ->getStateUsing(fn ($record) =>
                    $record->experienceYear?->getTranslation('name', 'en') . ' / ' . $record->experienceYear?->getTranslation('name', 'ar')
                ),

            // نوع التدريب باللغتين
            TextEntry::make('trainingType.name')
                ->label(__('Training Type'))
                ->getStateUsing(fn ($record) =>
                    $record->trainingType?->getTranslation('name', 'en') . ' / ' . $record->trainingType?->getTranslation('name', 'ar')
                ),

            // الحاجة باللغتين
            TextEntry::make('need.name')
                ->label(__('Need'))
                ->getStateUsing(fn ($record) =>
                    $record->need?->getTranslation('name', 'en') . ' / ' . $record->need?->getTranslation('name', 'ar')
                ),

            // الدورة باللغتين
            TextEntry::make('course.name')
                ->label(__('Course'))
                ->getStateUsing(fn ($record) =>
                    $record->course?->getTranslation('name', 'en') . ' / ' . $record->course?->getTranslation('name', 'ar')
                ),

            // تأكيد
            IconEntry::make('confirmed')
                ->label(__('Confirmed'))
                ->boolean(),

            // تاريخ الإنشاء
            TextEntry::make('created_at')
                ->dateTime(),

            // تاريخ التحديث
            TextEntry::make('updated_at')
                ->dateTime(),
        ]);

    }
}
