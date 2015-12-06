<?php


class FlyersControllerTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */

    /** @test */
    public function it_shows_the_form_to_create_a_new_flyer()
    {
        $this->visit('/flyers/create');
    }
}
