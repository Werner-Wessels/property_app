<?php

namespace App\Filament\Resources\LandlordTypeResource\Pages;

use App\Filament\Resources\LandlordTypeResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListLandlordTypes extends ListRecords
{
    protected static string $resource = LandlordTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
