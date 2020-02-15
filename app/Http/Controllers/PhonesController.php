<?php

namespace App\Http\Controllers;

use App\Phone;
use App\User;
use Illuminate\Http\Request;

class PhonesController extends Controller
{

    public function index()
    {
        return Phone::all();
    }

    /**
     * store a phone
     */
    public function create($id)
    {
        $user = User::find($id);
        if ($user) {
            return view('phone.create', compact('user'));
        } else {
            return redirect('/user');
        }
    }

    /**
     * store a phone
     */
    public function store($id)
    {
        $user = User::find($id);

        $data = $this->validateRequest();
        $data['user_id'] = $id;

        $phone = Phone::create($data);

        return redirect($phone->userpath($id));
    }

    /**
     * update a phone
     *
     * @param Phone $phone
     * @return Phone
     */
    public function update(Phone $phone)
    {
        $data = $this->validateRequest();

        $phone->update($data);

        return redirect($phone->path());
    }

    /**
     * update a phone
     *
     * @param Phone $phone
     */
    public function destroy($id, Phone $phone)
    {
        $phone->delete();

        return redirect('/user/' . $id .'/info');
    }

    /**
     * phone required data
     *
     * @return array
     */
    protected function validateRequest()
    {
        return request()->validate([
            'phone_type' => 'required',
            'phone_number' => 'required'
        ]);
    }
}
