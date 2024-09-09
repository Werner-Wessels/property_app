<?php

namespace App\Filament\Resources\LandlordTypeResource\Pages;

use App\Filament\Resources\ManagingAgentTypeResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditLandlordType extends EditRecord
{
    protected static string $resource = ManagingAgentTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
