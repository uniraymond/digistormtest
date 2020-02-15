<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    public function index()
    {
        return Profile::all();
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
     * edit a profile
     *
     * @param Profile $profile
     * @return Profile
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('profile.edit', compact('user'));
    }

    /**
     * show a profile
     *
     * @param Profile $profile
     * @return Profile
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('profile.show', compact('user'));
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
     * @return Profile
     */
    public function updateUserprofile($id)
    {
        $user = User::find($id);

        $data = $this->validateRequest();
        $data['user_id'] = $id;

        $user->Profile->update($data);

        return redirect($user->Profile->userpath());
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
        return \request()->validate([
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
