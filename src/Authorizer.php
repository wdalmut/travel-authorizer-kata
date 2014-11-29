<?php

class Authorizer
{
    private $vote;

    public function __construct($vote)
    {
        $this->vote = $vote;
    }

    public function vote()
    {
        return $this->vote;
    }
}
