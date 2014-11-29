<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Travel;
use Authorizer;

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
}
