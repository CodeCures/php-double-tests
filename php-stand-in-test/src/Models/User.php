<?php

namespace App\Models;

class User
{

    protected bool $subscribed = false;


    public function isSubscribed()
    {
        return $this->subscribed;
    }

    public function markAsSubscribed()
    {
        $this->subscribed = true;
    }
}