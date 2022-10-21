<?php

namespace App;

use App\Billing\Contract\Gateway;
use App\Billing\PaymentGateway;
use App\Models\User;

class Subscription
{

    public function __construct(protected Gateway $gateway){}

    public function create(User $user)
    {
        // Todo: the subscription through stripe
        
        $this->gateway->create();

        // update local user record
        $user->markAsSubscribed();
        // send welcome email or dispatch an event
    }
}