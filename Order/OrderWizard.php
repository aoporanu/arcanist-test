<?php


namespace App\Wizards\Order;


use App\Wizards\Order\Steps\ClientAndShopStep;
use App\Wizards\Order\Steps\ItemsStep;
use App\Wizards\Order\Steps\PaymentAndTermsStep;
use App\Wizards\Order\Steps\ReviewStep;
use Arcanist\AbstractWizard;
use Illuminate\Http\Request;

class OrderWizard extends AbstractWizard
{
    public static string $title = 'New Order';
    public static string $slug = 'order';
    public string $onCompleteAction = CreateOrderAction::class;

    protected array $steps = [
        ClientAndShopStep::class,
        PaymentAndTermsStep::class,
        ItemsStep::class,
        ReviewStep::class
    ];

    public static function middleware(): array
    {
        return [];
    }

    public function sharedData(Request $request): array
    {
        return [];
    }

    protected function title(): string
    {
        return __('orders.pages.create.title');
    }
}
