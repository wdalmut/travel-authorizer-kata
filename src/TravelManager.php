<?php

class TravelManager
{
    private $travel;
    private $authorizer;
    private $riskAuthorizer;

    public function __construct(Travel $travel)
    {
        $this->travel = $travel;
        $this->authorizer = [];
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

        $riskAuthorizerVote = true;
        if ($this->riskAuthorizer) {
            $riskAuthorizerVote = $this->riskAuthorizer->vote();
        }

        return $vote && $riskAuthorizerVote;
    }

    public function setRiskAuthorizer(RiskAuthorizer $authorizer)
    {
        $this->riskAuthorizer = $authorizer;
    }
}
