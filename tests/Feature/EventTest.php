<?php

namespace Tests\Feature;

use Tests\TestCase;

class EventTest extends TestCase
{
    /**
     * @return void
     */
    public function testCanGetEvents()
    {
        $response = $this->get('events');
        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function testCanGetEventsCreate()
    {
        $response = $this->get('events/create');
        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function testCanPostEvents()
    {
        $response = $this->post('events');
        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function testCanGetSpecifiedEvent()
    {
        $response = $this->get('events/1');
        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function testCanGetSpecifiedEventEdit()
    {
        $response = $this->get('events/1/edit');
        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function testCanPutSpecifiedEvent()
    {
        $response = $this->put('events/1');
        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function testCanDeleteSpecifiedEvent()
    {
        $response = $this->delete('events/1');
        $response->assertStatus(200);
    }
}
