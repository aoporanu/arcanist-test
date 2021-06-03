<?php


namespace App\Wizards\Order\Steps;


use Arcanist\Field;
use Arcanist\WizardStep;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientAndShopStep extends WizardStep
{
    public string $title = 'Client and shop';

    public string $slug = 'client-and-shop';

    public function viewData(Request $request): array
    {
        return [
            'client_id' => $this->data('client_id'),
            'shop_id' => $this->data('shop_id'),
            'clients' => DB::select('select id, name from clients'),
            'shops' => DB::select('select id, name from shops')
        ];

    }

    protected function fields(): array
    {
        return [
            Field::make('client_id')
            ->rules(['required', 'exists:clients,id']),
            Field::make('shop_id')
            ->rules(['required', 'exists:shops,id'])
        ];
    }
}
