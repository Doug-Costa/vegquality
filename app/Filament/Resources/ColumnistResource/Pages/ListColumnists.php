<?php

namespace App\Filament\Resources\ColumnistResource\Pages;

use App\Filament\Resources\ColumnistResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListColumnists extends ListRecords
{
    protected static string $resource = ColumnistResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
