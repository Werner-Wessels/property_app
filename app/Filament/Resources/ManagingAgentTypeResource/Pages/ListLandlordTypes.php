<?php

namespace App\Filament\Resources\LandlordTypeResource\Pages;

use App\Filament\Resources\ManagingAgentTypeResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListLandlordTypes extends ListRecords
{
    protected static string $resource = ManagingAgentTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
