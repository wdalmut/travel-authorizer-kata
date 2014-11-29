<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AuthorizerSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(true);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Authorizer');
    }

    function it_should_vote_yes()
    {
        $this->vote()->shouldBe(true);
    }

    function it_should_vote_no()
    {
        $this->beConstructedWith(false);
        $this->vote()->shouldBe(false);
    }
}
