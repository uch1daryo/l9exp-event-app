<?php

namespace Tests\Feature;

use App\Models\Event;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EventTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->artisan('db:seed', ['--class' => 'TestDatabaseSeeder']);
    }

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
        $user = User::first();
        $user_id = $user->id;
        $event = [
            'user_id' => $user_id,
            'start_at' => '2023-02-01 09:00:00',
            'end_at' => '2023-02-01 10:00:00',
        ];
        $response = $this->post('events', $event);
        $this->assertDatabaseHas('events', $event);
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
        $event = Event::first()->toArray();
        $endpoint = 'events/' . $event['id'];
        $event['end_at'] = '2024-01-01 00:00:00';
        $response = $this->put($endpoint, $event);
        $this->assertDatabaseHas('events', $event);
    }

    /**
     * @return void
     */
    public function testCanDeleteSpecifiedEvent()
    {
        $event = Event::first();
        $endpoint = 'events/' . $event->id;
        $response = $this->delete($endpoint);
        $this->assertSoftDeleted($event);
    }
}
