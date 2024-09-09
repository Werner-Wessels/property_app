<?php

namespace App\Filament\Resources\LandlordResource\Pages;

use App\Filament\Resources\ManagingAgentResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditLandlord extends EditRecord
{
    protected static string $resource = ManagingAgentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
