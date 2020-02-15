<?php

namespace Tests\Feature;

use App\Phone;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PhonesTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */

    public function a_user_phone_can_be_added()
    {
        $this->withoutExceptionHandling();

        $response = $this->storePhone();

        $phone = Phone::first();

        $this->assertCount(1, Phone::all());

        $response->assertRedirect('/phone/' . $phone->id);
    }

    /** @test */

    public function a_user_phone_can_be_updated()
    {
        $this->withoutExceptionHandling();

        $this->storePhone();

        $phone = Phone::first();

        $data = array(
            'user_id' => $phone->user_id,
            'phone_type' => 'Work Cellphone',
            'phone_number' => '0401111111',
        );

        $response = $this->patch('/phone/' . $phone->id, $data);

        $phone->refresh();

        $this->assertEquals('Work Cellphone', $phone->phone_type);
        $this->assertEquals('0401111111', $phone->phone_number);

        $response->assertRedirect('/phone/' . $phone->id);
    }

    private function storePhone()
    {
        return $this->post('/phone', [
            'user_id' => 1,
            'phone_type' => 'Home Cellphone',
            'phone_number' => '0401000000',
        ]);
    }

    /** @test */
    public function a_user_phone_can_be_deleted()
    {
        $this->withoutExceptionHandling();

        $response = $this->storePhone();

        $this->assertCount(1, Phone::all());

        $phone = Phone::first();

        $response = $this->delete('/phone/' . $phone->id);
        $this->assertCount(0, Phone::all());

        $response->assertRedirect('/phone');
    }
}
