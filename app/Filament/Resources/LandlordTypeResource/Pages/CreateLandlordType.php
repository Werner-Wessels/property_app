<?php

namespace App\Filament\Resources\LandlordTypeResource\Pages;

use App\Filament\Resources\LandlordTypeResource;
use Filament\Resources\Pages\CreateRecord;

class CreateLandlordType extends CreateRecord
{
    protected static string $resource = LandlordTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [

        ];
    }
}
