<?php

namespace App\Filament\Resources\Clients\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ClientForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(['md' => 3])
                    ->columnSpanFull() // Make grid span full page width
                    ->schema([

                        // Left side: Personal & Contact Information (2 columns)
                        Section::make()
                            ->columnSpan(2)
                            ->schema([

                                // Personal Information
                                Section::make('Personal Information')
                                    ->columnSpanFull()
                                    ->schema([
                                        TextInput::make('first_name')
                                            ->required()
                                            ->string()
                                            ->minLength(2)
                                            ->maxLength(255)
                                            ->columnSpan(1),
                                        TextInput::make('last_name')
                                            ->required()
                                            ->string()
                                            ->minLength(2)
                                            ->maxLength(255)
                                            ->columnSpan(1),
                                        TextInput::make('email')
                                            ->label('Email address')
                                            ->email()
                                            ->required()
                                            ->columnSpan(2),
                                        TextInput::make('phone')
                                            ->tel()
                                            ->columnSpan(1),
                                        TextInput::make('mobile')
                                            ->columnSpan(1),
                                        FileUpload::make('photo')
                                            ->acceptedFileTypes(['image/png', 'image/jpg', 'image/jpeg', 'image/webp'])
                                            ->columnSpan(2),
                                        Textarea::make('linkedin')
                                            ->columnSpanFull(),
                                        Toggle::make('active')
                                            ->required()
                                            ->columnSpan(1)
                                            ->visibleOn('edit'),
                                    ]),

                                // Contact / Business Information
                                Section::make('Contact Information')
                                    ->columnSpanFull()
                                    ->schema([
                                        TextInput::make('title')
                                            ->maxLength(255)
                                            ->columnSpan(1),
                                        TextInput::make('company')
                                            ->maxLength(255)
                                            ->columnSpan(2),
                                        TextInput::make('role')
                                            ->maxLength(255)
                                            ->columnSpan(1),
                                        TextInput::make('company_website')
                                            ->url()
                                            ->columnSpan(2),
                                        Textarea::make('business_details')
                                            ->maxLength(65535)
                                            ->columnSpanFull(),
                                        TextInput::make('business_type')
                                            ->columnSpan(1),
                                        Select::make('company_size')
                                            ->options([
                                                'small' => 'Small',
                                                'mid' => 'Mid',
                                                'big' => 'Big',
                                            ])
                                            ->columnSpan(1),
                                        Select::make('temperature')
                                            ->options([
                                                'cold' => 'Cold',
                                                'warm' => 'Warm',
                                                'hot' => 'Hot',
                                            ])
                                            ->columnSpan(1),
                                    ])->disabledOn('create'),
                            ]),

                        // Right side: Additional Information (1 column)
                        Section::make('Additional Information')
                            ->columnSpan(1)
                            ->schema([
                                Textarea::make('notes')
                                    ->columnSpanFull(),
                                Textarea::make('referrals')
                                    ->columnSpanFull(),
                            ]),

                    ]),
            ]);
    }
}
