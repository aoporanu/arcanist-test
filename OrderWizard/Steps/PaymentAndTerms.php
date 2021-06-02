<?php declare(strict_types=1);

namespace App\Wizards\OrderWizard\Steps;

use Arcanist\Field;
use Arcanist\WizardStep;
use Illuminate\Http\Request;

class PaymentAndTerms extends WizardStep
{
    /**
     * The name of the step that gets displayed in the step list.
     */
    public string $title = 'PaymentAndTerms';

    /**
     * The slug of the wizard that is used in the URL.
     */
    public string $slug = 'payment-and-terms';

    /**
     * Returns the view data for the template.
     */
    public function viewData(Request $request): array
    {
        return parent::viewData($request);
    }

    protected function fields(): array
    {
        return [
            // Field::make('username')
            //     ->rules(['required', 'unique:users,username'])
        ];
    }
}
