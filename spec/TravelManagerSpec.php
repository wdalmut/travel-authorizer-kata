<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Traveller;

class TravelManagerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('TravelManager');
    }

    function it_should_say_if_a_traveller_can_travel()
    {
        $this->canTravel()->shouldBe(true);
    }
}
