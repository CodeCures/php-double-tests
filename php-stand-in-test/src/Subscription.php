<?php

namespace App;

use App\Billing\PaymentGateway;
use App\Models\User;

class Subscription
{
    protected PaymentGateway $paymentGateway;

    public function __construct(PaymentGateWay $paymentGateway)
    {
        $this->paymentGateway = $paymentGateway;
    }

    public function create(User $user)
    {
        // Todo: the subscription through stripe
        
        $this->paymentGateway->create();

        // update local user record
        $user->markAsSubscribed();
        // send welcome email or dispatch an event
    }
}