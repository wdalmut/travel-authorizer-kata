<?php

class RiskAuthorizer extends Authorizer
{
    private $travel;
    private $terriblePlaces = [
        "NAP",
        "FCO",
        "GOA",
    ];

    public function __construct($travel)
    {
        $this->travel = $travel;
    }

    public function vote()
    {
        if (in_array($this->travel->getDeparture(), $this->terriblePlaces)) {
            return false;
        }

        if (in_array($this->travel->getArrival(), $this->terriblePlaces)) {
            return false;
        }

        return true;
    }
}
