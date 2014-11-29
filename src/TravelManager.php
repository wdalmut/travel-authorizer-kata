<?php

class TravelManager
{
    private $travel;
    private $authorizer;

    public function __construct(Travel $travel)
    {
        $this->travel = $travel;
    }

    public function setAuthorizer(Authorizer $authorizer)
    {
        $this->authorizer = $authorizer;
    }

    public function canTravel()
    {
        return $this->authorizer->vote();
    }
}
