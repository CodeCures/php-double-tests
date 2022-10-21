<?php

namespace Test;

use App\Billing\Contract\Gateway;

class FakePaymentGateway implements Gateway
{
    public function create()
    {
        # code...
    }
}