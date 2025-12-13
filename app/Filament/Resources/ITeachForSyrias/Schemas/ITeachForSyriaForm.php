<?php

namespace App\Filament\Resources\ITeachForSyrias\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ITeachForSyriaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // الاسم باللغتين
                TextInput::make('full_name.en')
                    ->label('Full Name (EN)')
                    ->required(),

                TextInput::make('full_name.ar')
                    ->label('Full Name (AR)')
                    ->required(),

                // الهاتف
                TextInput::make('phone')
                    ->tel()
                    ->required(),

                // البريد الإلكتروني
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->default(null),

                // مكان الإقامة باللغتين
                TextInput::make('residence.en')
                    ->label('Residence (EN)')
                    ->required(),

                TextInput::make('residence.ar')
                    ->label('Residence (AR)')
                    ->required(),

                // سنة الميلاد
                DatePicker::make('birth_year')
                    ->label('Birth Year')
                    ->displayFormat('Y')
                    ->format('Y')
                    ->default(null)
                    ->required(),

                Select::make('gender')
                    ->label(__('Gender'))
                    ->options([
                        'male'   => 'Male / ذكر',
                        'female' => 'Female / أنثى',
                    ])
                    ->default(null)
                    ->required(),

                Select::make('degree_id')
                    ->label(__('Degree'))
                    ->relationship('degree', 'name')
                    ->getOptionLabelFromRecordUsing(fn ($record) =>
                        $record->getTranslation('name', 'en') . ' / ' . $record->getTranslation('name', 'ar')
                    )
                    ->searchable()
                    ->preload()
                    ->required(),


                Select::make('sector_id')
                    ->label(__('Sector'))
                    ->relationship('sector', 'name')
                    ->getOptionLabelFromRecordUsing(fn ($record) =>
                        $record->getTranslation('name', 'en') . ' / ' . $record->getTranslation('name', 'ar')
                    )
                    ->searchable()
                    ->preload()
                    ->required(),

                Select::make('experience_year_id')
                    ->label(__('Experience Years'))
                    ->relationship('experienceYear', 'name')
                    ->getOptionLabelFromRecordUsing(fn ($record) =>
                        $record->getTranslation('name', 'en') . ' / ' . $record->getTranslation('name', 'ar')
                    )
                    ->searchable()
                    ->preload()
                    ->required(),

                Select::make('training_type_id')
                    ->label(__('Training Type'))
                    ->relationship('trainingType', 'name')
                    ->getOptionLabelFromRecordUsing(fn ($record) =>
                        $record->getTranslation('name', 'en') . ' / ' . $record->getTranslation('name', 'ar')
                    )
                    ->searchable()
                    ->preload()
                    ->required(),

                Select::make('need_id')
                    ->label(__('Need'))
                    ->relationship('need', 'name')
                    ->getOptionLabelFromRecordUsing(fn ($record) =>
                        $record->getTranslation('name', 'en') . ' / ' . $record->getTranslation('name', 'ar')
                    )
                    ->searchable()
                    ->preload()
                    ->required(),

                Select::make('course_id')
                    ->label(__('Course'))
                    ->relationship('course', 'name')
                    ->getOptionLabelFromRecordUsing(fn ($record) =>
                        $record->getTranslation('name', 'en') . ' / ' . $record->getTranslation('name', 'ar')
                    )
                    ->searchable()
                    ->preload()
                    ->required(),


                // تأكيد
                Toggle::make('confirmed')
                    ->label(__('Confirmed'))
                    ->required(),
            ]);

    }
}
