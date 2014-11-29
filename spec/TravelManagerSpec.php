<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Travel;
use Authorizer;
use RiskAuthorizer;

class TravelManagerSpec extends ObjectBehavior
{
    function let(Travel $travel)
    {
        $this->beConstructedWith($travel);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('TravelManager');
    }

    function it_should_say_if_a_traveller_can_travel(Authorizer $authorizer)
    {
        $authorizer->vote()->willReturn(true);
        $this->setAuthorizer($authorizer);

        $this->canTravel()->shouldBe(true);
    }

    function it_should_set_the_authorizer(Authorizer $authorizer)
    {
        $this->setAuthorizer($authorizer);
    }

    function it_should_wrap_the_yes_vote(Authorizer $authorizer)
    {
        $authorizer->vote()->willReturn(true);
        $this->setAuthorizer($authorizer);

        $this->canTravel()->shouldBe(true);
    }

    function it_should_wrap_the_no_vote(Authorizer $authorizer)
    {
        $authorizer->vote()->willReturn(false);
        $this->setAuthorizer($authorizer);

        $this->canTravel()->shouldBe(false);
    }

    function it_should_allow_multiple_authorizer(Authorizer $authorizer, Authorizer $authorizer2)
    {
        $this->addAuthorizer($authorizer);
        $this->addAuthorizer($authorizer2);
    }

    function it_should_handle_split_decision_with_no(Authorizer $authorizer, Authorizer $authorizer2)
    {
        $authorizer->vote()->willReturn(true);
        $authorizer2->vote()->willReturn(false);

        $this->addAuthorizer($authorizer);
        $this->addAuthorizer($authorizer2);

        $this->canTravel()->shouldBe(false);
    }

    function it_should_handle_decision_with_no(Authorizer $authorizer, Authorizer $authorizer2)
    {
        $authorizer->vote()->willReturn(false);
        $authorizer2->vote()->willReturn(false);

        $this->addAuthorizer($authorizer);
        $this->addAuthorizer($authorizer2);

        $this->canTravel()->shouldBe(false);
    }

    function it_should_handle_decision_with_yes(Authorizer $authorizer, Authorizer $authorizer2)
    {
        $authorizer->vote()->willReturn(true);
        $authorizer2->vote()->willReturn(true);

        $this->addAuthorizer($authorizer);
        $this->addAuthorizer($authorizer2);

        $this->canTravel()->shouldBe(true);
    }

    function it_should_handle_the_risk_travel_authorizer(RiskAuthorizer $authorizer)
    {
        $this->setRiskAuthorizer($authorizer);
    }

    function it_should_handle_risk_travel_authorizer_yes(RiskAuthorizer $authorizer)
    {
        $authorizer->vote()->willReturn(true);
        $this->setRiskAuthorizer($authorizer);

        $this->canTravel()->shouldBe(true);
    }

    function it_should_handle_risk_travel_authorizer_no(Authorizer $authorizer, RiskAuthorizer $riskAuthorizer)
    {
        $authorizer->vote()->willReturn(true);
        $this->addAuthorizer($authorizer);
        $riskAuthorizer->vote()->willReturn(false);
        $this->setRiskAuthorizer($riskAuthorizer);

        $this->canTravel()->shouldBe(false);
    }
}
