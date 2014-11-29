<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Travel;

class RiskAuthorizerSpec extends ObjectBehavior
{
    function let(Travel $travel)
    {
        $this->beConstructedWith($travel);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('RiskAuthorizer');
    }

    function it_should_vote_yes()
    {
        $this->vote()->shouldBe(true);
    }

    function it_should_say_no_on_NAP_as_return(Travel $travel)
    {
        $travel->getDeparture()->willReturn("TRN");
        $travel->getArrival()->willReturn("NAP");

        $this->vote()->shouldBe(false);
    }

    function it_should_say_no_on_NAP_as_departure(Travel $travel)
    {
        $travel->getDeparture()->willReturn("NAP");
        $travel->getArrival()->willReturn("TRN");

        $this->vote()->shouldBe(false);
    }
}
