<?php

namespace App\Filament\Resources\LandlordResource\Pages;

use App\Filament\Resources\ManagingAgentResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListLandlords extends ListRecords
{
    protected static string $resource = ManagingAgentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
