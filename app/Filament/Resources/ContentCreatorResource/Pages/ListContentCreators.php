<?php

namespace App\Filament\Resources\ContentCreatorResource\Pages;

use App\Filament\Resources\ContentCreatorResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListContentCreators extends ListRecords
{
    protected static string $resource = ContentCreatorResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
