<?php

namespace Tests\Feature;

use App\Profile;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProfilesTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */

    public function a_user_profile_can_be_added()
    {
        $this->withoutExceptionHandling();

        $response = $this->storeProfile();

        $profile = Profile::first();

        $this->assertCount(1, Profile::all());

        $response->assertRedirect('/profile/' . $profile->id);
    }

    /** @test */

    public function a_user_profile_can_be_updated()
    {
        $this->withoutExceptionHandling();

        $this->storeProfile();

        $profile = Profile::first();

        $data = array(
            'user_id' => $profile->id,
            'fname' => 'Ray',
            'lname' => $profile->lname,
            'dob' => $profile->dob,
            'company' => $profile->company,
            'position' => 'Full Stack Developer',
            'phone' => $profile->phone,
            'address' => $profile->address,
            'region' => $profile->region,
            'suburb' => $profile->suburb,
            'state' => $profile->state,
            'postcode' => '4333',
            'country' => $profile->country,
        );

        $response = $this->patch('/profile/' . $profile->id, $data);

        $profile->refresh();

        $this->assertEquals('Ray', $profile->fname);
        $this->assertEquals('Full Stack Developer', $profile->position);
        $this->assertEquals('4333', $profile->postcode);

        $response->assertRedirect('/profile/' . $profile->id);
    }

    private function storeProfile()
    {
        return $this->post('/profile', [
            'user_id' => '1',
            'fname' => 'Raymond',
            'lname' => 'Feng',
            'dob' => '1998-11-10',
            'company' => 'Digistorm Ltd.',
            'position' => 'Developer',
            'phone' => '0401000000',
            'address' => 'Miami',
            'region' => 'Miami',
            'suburb' => 'Gold Coast',
            'state' => 'QLD',
            'postcode' => '4222',
            'country' => 'Australia'
        ]);
    }

    /** @test */
    public function a_user_profile_can_be_deleted()
    {
        $this->withoutExceptionHandling();

        $response = $this->storeProfile();

        $this->assertCount(1, Profile::all());

        $profile = Profile::first();

        $response = $this->delete('/profile/' . $profile->id);
        $this->assertCount(0, Profile::all());

        $response->assertRedirect('/profile');
    }
}
