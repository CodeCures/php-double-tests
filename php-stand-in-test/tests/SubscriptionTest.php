<?php

namespace Tests;

use App\Billing\Contract\Gateway;
use App\Models\User;
use App\Subscription;
use PHPUnit\Framework\TestCase;
use Test\FakePaymentGateway;

class SubscriptionTest extends TestCase
{
    /** @test */
    public function it_creates_stripe_subscription()
    {
        $this->markTestSkipped("we will come back top this ASAP");
    }

    /** @test */
    public function creating_a_subscription_marks_user_as_subscribed()
    {
        $user = new User();
        $subscription = new Subscription($this->createMock(Gateway::class));

        $this->assertFalse($user->isSubscribed());

        $subscription->create($user);

        $this->assertTrue($user->isSubscribed());
    }
    

}
