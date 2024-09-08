<?php

namespace App\Filament\Resources\LandlordTypeResource\Pages;

use App\Filament\Resources\LandlordTypeResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditLandlordType extends EditRecord
{
    protected static string $resource = LandlordTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
