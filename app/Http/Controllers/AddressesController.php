<?php

namespace App\Http\Controllers;

use App\Address;
use App\User;
use Illuminate\Http\Request;

class AddressesController extends Controller
{
    public function index()
    {
        return Address::all();
    }

    /**
     * store a address
     */
    public function create($id)
    {
        $user = User::findOrFail($id);

        return view('address.create', compact('user'));
    }
    /**
     * store a address
     */
    public function store($id)
    {
        $data = $this->validateRequest();
        $data['user_id'] = $id;
        $address = Address::create($data);

        return redirect($address->userpath($id));
    }

    /**
     * update a address
     *
     * @param Address $address
     * @return Address
     */
    public function update($id)
    {
        $user = User::find($id);

        $data = $this->validateRequest();

        $user->Address->update($data);

        return redirect($user->Address->userpath());
    }

    /**
     * update a address
     *
     * @param Address $address
     */
    public function destroy($id, Address $address)
    {
        $address->delete();

        return redirect('/user/' . $id . '/info');
    }

    /**
     * address required data
     *
     * @return array
     */
    protected function validateRequest()
    {
        return request()->validate([
            'address_type' => 'required',
            'address' => 'required',
            'region' => 'required',
            'suburb' => 'required',
            'state' => 'required',
            'postcode' => 'required',
            'country' => 'required',
        ]);
    }
}
