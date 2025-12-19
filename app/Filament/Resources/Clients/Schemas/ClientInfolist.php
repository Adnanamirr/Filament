<?php

namespace App\Filament\Resources\Clients\Schemas;

use Filament\Actions\Action;
use Filament\Infolists\Components\ImageEntry;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ClientInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Client Details')
                    ->columnSpanFull()
                    ->tabs([

                        Tab::make('Personal Information')
                            ->schema([
                                TextEntry::make('first_name')->label('First Name'),
                                TextEntry::make('last_name')->label('Last Name'),
                                TextEntry::make('email')->label('Email Address'),
                                TextEntry::make('phone'),
                                TextEntry::make('mobile'),
                                TextEntry::make('linkedin')
                                    ->suffixAction(
                                        Action::make('open')
                                            ->icon('heroicon-m-arrow-top-right-on-square')
                                            ->url(fn ($record) => $record->linkedin)
                                            ->openUrlInNewTab()
                                    ),
                                TextEntry::make('active')->badge()->color(fn( bool $state) => match ($state) {
                                    true => 'success',
                                    false => 'Gray',
                                })
                            ]),

                        Tab::make('Business Information')
                            ->schema([
                                TextEntry::make('title'),
                                TextEntry::make('company'),
                                TextEntry::make('role'),
                                ImageEntry::make('photo')->columnSpan(1),
                                TextEntry::make('company_website')->label('Company Website'),
                                TextEntry::make('business_details')->columnSpanFull(),
                                TextEntry::make('business_type'),
                                TextEntry::make('company_size')->badge(),
                                TextEntry::make('temperature')->badge(),
                            ]),

                        Tab::make('Additional Information')
                            ->schema([
                                TextEntry::make('notes')->columnSpanFull(),
                                TextEntry::make('referrals')->columnSpanFull(),
                            ]),

                    ]),
            ]);
    }
}
