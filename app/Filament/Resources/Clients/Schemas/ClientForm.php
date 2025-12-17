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
                Grid::make([
                    'md' => 3
                ])
                    ->schema([
                        Section::make()->schema([
                                 Section::make('Personal Information')->schema([
                                        TextInput::make('first_name')
                                            ->required()
                                            ->string()
                                            ->maxLength(255)
                                            ->minLength(2),
                                        TextInput::make('last_name')
                                            ->required()
                                            ->string()
                                            ->maxLength(255)
                                            ->minLength(2),
                                        TextInput::make('email')
                                            ->label('Email address')
                                            ->email()
                                            ->required(),
                                        TextInput::make('phone')
                                            ->tel(),
                                        TextInput::make('mobile'),
                                        FileUpload::make('photo')
                                            ->acceptedFileTypes(['image/png', 'image/jpg', 'image/jpeg', 'image/webp']),
                                        Textarea::make('linkedin'),


                                        Toggle::make('active')
                                            ->required(),
                                    ]),
                                Section::make('Contact Information')
                                    ->schema([

                                        TextInput::make('title')
                                        ->maxLength(255),
                                        TextInput::make('company'),
                                        TextInput::make('role')
                                            ->maxLength(255),

                                        TextInput::make('company_website')
                                            ->url(),
                                        Textarea::make('business_details')
                                            ->maxLength(65535)
                                            ->columnSpanFull(),

                                        TextInput::make('business_type'),
                                        Select::make('company_size')
                                            ->options([
                                                'small' => 'Small',
                                                'mid' => 'Mid',
                                                'big' => 'Big'
                                            ]),
                                        Select::make('temperature')
                                            ->options([
                                                'cold' => 'Cold',
                                                'warm' => 'Warm',
                                                'hot' => 'Hot'
                                            ]),

                                    ]),
                            ])->columnSpan(2),


                Section::make('Additional Information')
                    ->schema([

                        Textarea::make('notes'),
                        Textarea::make('referrals')
                            ->columnSpanFull(),

                ])->columnSpan(1),
            ]),
        ]);
    }

}
