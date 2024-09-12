<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Datapoint;

class DatapointTable extends DataTableComponent
{
    protected $model = Datapoint::class;

    public function configure(): void
    {
        $this->setPrimaryKey('key');
    }

    public function columns(): array
    {
        return [
            Column::make("Key", "key")
                ->sortable(),
            Column::make("Value", "value")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
        ];
    }
}
