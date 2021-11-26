<?php

declare(strict_types=1);

namespace App\Http\Livewire;

use App\Models\Newsletter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\QueryException;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\PowerGridEloquent;
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;

final class NewsletterTable extends PowerGridComponent
{
    use ActionButton;

    /**
     * @return array<string,string>
     */
    protected function getListeners(): array
    {
        $this->listeners[] = 'alertEvent';

        return $this->listeners;
    }

    /**
     * Alert.
     *
     * @param array<string,string> $data
     */
    public function alertEvent(array $data): void
    {
        $this->dispatchBrowserEvent('showAlert', $data);
    }

    /*
    |--------------------------------------------------------------------------
    |  Features Setup
    |--------------------------------------------------------------------------
    | Setup Table's general features
    |
    */
    public function setUp(): void
    {
        $this->showCheckBox()
            ->showPerPage()
            ->showSearchInput()
            ->showExportOption('download', ['excel', 'csv']);
    }

    /*
    |--------------------------------------------------------------------------
    |  Datasource
    |--------------------------------------------------------------------------
    | Provides data to your Table using a Model or Collection
    |
    */
    public function datasource(): ?Builder
    {
        return Newsletter::query();
    }

    /*
    |--------------------------------------------------------------------------
    |  Relationship Search
    |--------------------------------------------------------------------------
    | Configure here relationships to be used by the Search and Table Filters.
    |
    */

    /**
     * Relationship search.
     *
     * @return array<int,bool>
     */
    public function relationSearch(): array
    {
        return [];
    }

    /*
    |--------------------------------------------------------------------------
    |  Add Column
    |--------------------------------------------------------------------------
    | Make Datasource fields available to be used as columns.
    | You can pass a closure to transform/modify the data.
    |
    */
    public function addColumns(): ?PowerGridEloquent
    {
        return PowerGrid::eloquent()
            ->addColumn('id')
            ->addColumn('name')
            ->addColumn('email');
    }

    /*
    |--------------------------------------------------------------------------
    |  Include Columns
    |--------------------------------------------------------------------------
    | Include the columns added columns, making them visible on the Table.
    | Each column can be configured with properties, filters, actions...
    |
    */

    /**
     * PowerGrid Columns.
     *
     * @return array<int, \PowerComponents\LivewirePowerGrid\Column>
     */
    public function columns(): array
    {
        return [
            Column::add()
                ->title('ID')
                ->field('id')
                ->makeInputRange(),

            Column::add()
                ->title('ID')
                ->field('name')
                ->editOnClick()
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::add()
                ->title('EMAIL')
                ->field('email')
                ->editOnClick()
                ->sortable()
                ->searchable()
                ->makeInputText(),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Actions Method
    |--------------------------------------------------------------------------
    | Enable this section only when you have defined routes for these actions.
    |
    */

    /**
     * PowerGrid action buttons.
     *
     * @return array<int, \PowerComponents\LivewirePowerGrid\Button>
     */
    public function actions()
    {
        return [
            Button::add('info')
                ->caption('Enviar e-mail')
                ->class('bg-indigo-500 cursor-pointer text-white px-3 py-2 text-sm rounded-md')
                ->emit('alertEvent', ['email' => 'email']),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Edit Method
    |--------------------------------------------------------------------------
    | Enable this section to use editOnClick() or toggleable() methods
    |
    */

    /**
     * PowerGrid Update.
     *
     * @param array<string,string> $data
     */
    public function update(array $data): bool
    {
        try {
            $updated = Newsletter::query()->findOrFail($data['id'])->update([
                $data['field'] => $data['value'],
           ]);
        } catch (QueryException $exception) {
            $updated = false;
        }

        return $updated;
    }

    public function updateMessages(string $status = 'error', string $field = '_default_message'): string
    {
        $updateMessages = [
            'success' => [
                '_default_message' => __('Data has been updated successfully!'),
                //'custom_field' => __('Custom Field updated successfully!'),
            ],
            'error' => [
                '_default_message' => __('Error updating the data.'),
                //'custom_field' => __('Error updating custom field.'),
            ],
        ];

        $message = ($updateMessages[$status][$field] ?? $updateMessages[$status]['_default_message']);

        return (is_string($message)) ? $message : 'Error!';
    }

    public function template(): ?string
    {
        return null;
    }
}
