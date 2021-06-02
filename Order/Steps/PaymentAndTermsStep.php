<?php declare(strict_types=1);

namespace App\Wizards\Order\Steps;

use Arcanist\Field;
use Arcanist\WizardStep;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentAndTermsStep extends WizardStep
{
    /**
     * The name of the step that gets displayed in the step list.
     */
    public string $title = 'PaymentAndTermsStep';

    /**
     * The slug of the wizard that is used in the URL.
     */
    public string $slug = 'payment-and-terms-step';

    /**
     * Returns the view data for the template.
     */
    public function viewData(Request $request): array
    {
        return [
            'payment' => $this->data('payment')
        ];
    }

    protected function fields(): array
    {
        return [
            Field::make('payment')
            ->rules(['required', function($attribute, $value, $fail) {
                $maxTerm = DB::select('select payment from clients where id=?', [$this->data('client_id')]);
                if($value > $maxTerm[0]->payment) {
                    $fail('The '.$attribute.' value must be less than the client\'s agreed payment term');
                }
            }])
        ];
    }
}
