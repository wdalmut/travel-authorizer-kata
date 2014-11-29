<?php

class TravelManager
{
    private $travel;
    private $authorizer;

    public function __construct(Travel $travel)
    {
        $this->travel = $travel;
    }

    /**
     * @see addAuthorizer
     *
     * @deprecated
     */
    public function setAuthorizer(Authorizer $authorizer)
    {
        $this->authorizer = [$authorizer];
    }

    public function addAuthorizer($authorizer)
    {
        $this->authorizer[] = $authorizer;
    }

    public function canTravel()
    {
        $vote = true;
        foreach ($this->authorizer as $authorizer) {
            $vote = $authorizer->vote() && $vote;
        }

        return $vote;
    }
}
