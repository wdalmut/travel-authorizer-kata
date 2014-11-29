<?php

class TravelManager
{
    private $travel;

    public function __construct(Travel $travel)
    {
        $this->travel = $travel;
    }

    public function canTravel()
    {
        return true;
    }
}
