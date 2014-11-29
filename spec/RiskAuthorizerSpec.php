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
}
