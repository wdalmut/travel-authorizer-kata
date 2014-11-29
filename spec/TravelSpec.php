<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TravelSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Travel');
    }

    function it_should_say_departure_and_arrival_stations()
    {
        $this->setDeparture("TRN");
        $this->setArrival("FCO");

        $this->getDeparture()->shouldReturn("TRN");
        $this->getArrival()->shouldReturn("FCO");
    }
}
