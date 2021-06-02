<?php declare(strict_types=1);

namespace App\Wizards\OrderWizard\Steps;

use Arcanist\Field;
use Arcanist\WizardStep;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientAndShop extends WizardStep
{
    /**
     * The name of the step that gets displayed in the step list.
     */
    public string $title = 'ClientAndShop';

    /**
     * The slug of the wizard that is used in the URL.
     */
    public string $slug = 'client-and-shop';

    /**
     * Returns the view data for the template.
     */
    public function viewData(Request $request): array
    {
        $data = $this->withFormData(
            [
                'clients' => DB::select('select id, name from clients'),
                'shops' => DB::select('select id,name from shops')
            ]);
        dump($data);
        return $this->withFormData(
            [
                'clients' => DB::select('select id, name from clients'),
                'shops' => DB::select('select id,name from shops')
            ]);
    }

    protected function fields(): array
    {
        return [
            // Field::make('username')
            //     ->rules(['required', 'unique:users,username'])
        ];
    }
}
