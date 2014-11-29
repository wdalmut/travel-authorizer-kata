<?php

class RiskAuthorizer extends Authorizer
{
    private $travel;

    public function __construct($travel)
    {
        $this->travel = $travel;
    }

    public function vote()
    {
        return true;
    }
}
