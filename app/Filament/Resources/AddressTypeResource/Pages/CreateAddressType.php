<?php

namespace App\Filament\Resources\AddressTypeResource\Pages;

use App\Filament\Resources\AddressTypeResource;
use Filament\Resources\Pages\CreateRecord;

class CreateAddressType extends CreateRecord
{
    protected static string $resource = AddressTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [

        ];
    }
}
