<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    public function index()
    {

    }

    /**
     * store a profile
     */
    public function store()
    {
        $data = $this->validateRequest();

        $profile = Profile::create($data);

        return redirect($profile->path());
    }

    /**
     * update a profile
     *
     * @param Profile $profile
     * @return Profile
     */
    public function update(Profile $profile)
    {
        $data = $this->validateRequest();

        $profile->update($data);

        return redirect($profile->path());
    }

    /**
     * update a profile
     *
     * @param Profile $profile
     */
    public function destroy(Profile $profile)
    {
        $profile->delete();

        return redirect('/profile');
    }

    /**
     * profile required data
     *
     * @return array
     */
    protected function validateRequest()
    {
        return request()->validate([
            'user_id' => 'required',
            'fname' => 'required',
            'lname' => 'required',
            'dob' => 'required',
            'company' => 'required',
            'position' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'region' => 'required',
            'suburb' => 'required',
            'state' => 'required',
            'postcode' => 'required',
            'country' => 'required',
        ]);
    }
}
