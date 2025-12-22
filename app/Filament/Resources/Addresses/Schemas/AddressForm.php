<?php

namespace App\Filament\Resources\Addresses\Schemas;

use App\Models\City;
use App\Models\Country;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Database\Eloquent\Model;

class AddressForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),

                TextInput::make('street')
                    ->required()
                    ->maxLength(255),

                TextInput::make('zip')
                    ->required()
                    ->maxLength(255),

                Select::make('country_id')->label('Country')->options(Country::all()->pluck('name', 'id'))->required()->searchable()->preload()->live(),

                Select::make('city_id')
                    ->options(function (Get $get, Set $set){

                        if(!$get('country_id')) {
                            $cityCountryId = City::where('id' , $get('city_id'))->first();
                            $set('country_id', $cityCountryId);
                        };

                        return City::where('country_id', $get('country_id'))->pluck('name', 'id');
                })
                    ->required()
                    ->searchable()
                    ->preload(),

                Select::make('client_id')
                    ->relationship('client', 'first_name')
                    ->getOptionLabelFromRecordUsing(fn(Model $record) => "{$record->first_name} {$record->last_name}")
                    ->required()
                    ->searchable()
                    ->preload(),

            ]);
    }
}
