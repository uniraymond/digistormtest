<?php

namespace Tests\Feature;

use App\Address;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AddressTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */

    public function a_user_address_can_be_added()
    {
        $this->withoutExceptionHandling();

        $response = $this->storeAddress();

        $address = Address::first();

        $this->assertCount(1, Address::all());

        $response->assertRedirect('/address/' . $address->id);
    }

    /** @test */

    public function a_user_address_can_be_updated()
    {
        $this->withoutExceptionHandling();

        $this->storeAddress();

        $address = Address::first();

        $data = array(
            'user_id' => $address->id,
            'address_type' => 'Home Address',
            'address' => '55 Ashmore Rd',
            'region' => $address->region,
            'suburb' => $address->suburb,
            'state' => $address->state,
            'postcode' => '4333',
            'country' => $address->country,
        );

        $response = $this->patch('/address/' . $address->id, $data);

        $address->refresh();

        $this->assertEquals('Home Address', $address->address_type);
        $this->assertEquals('55 Ashmore Rd', $address->address);
        $this->assertEquals('4333', $address->postcode);

        $response->assertRedirect('/address/' . $address->id);
    }

    private function storeAddress()
    {
        return $this->post('/address', [
            'user_id' => '1',
            'address_type' => 'Office Address',
            'address' => '666 Miami',
            'region' => 'Miami',
            'suburb' => 'Gold Coast',
            'state' => 'QLD',
            'postcode' => '4222',
            'country' => 'Australia'
        ]);
    }

    /** @test */
    public function a_user_address_can_be_deleted()
    {
        $this->withoutExceptionHandling();

        $response = $this->storeAddress();

        $this->assertCount(1, Address::all());

        $address = Address::first();

        $response = $this->delete('/address/' . $address->id);
        $this->assertCount(0, Address::all());

        $response->assertRedirect('/address');
    }
}
