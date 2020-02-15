<?php

namespace App\Http\Controllers;

use App\Address;
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
    public function store()
    {
        $data = $this->validateRequest();

        $address = Address::create($data);

        return redirect($address->path());
    }

    /**
     * update a address
     *
     * @param Address $address
     * @return Address
     */
    public function update(Address $address)
    {
        $data = $this->validateRequest();

        $address->update($data);

        return redirect($address->path());
    }

    /**
     * update a address
     *
     * @param Address $address
     */
    public function destroy(Address $address)
    {
        $address->delete();

        return redirect('/address');
    }

    /**
     * address required data
     *
     * @return array
     */
    protected function validateRequest()
    {
        return request()->validate([
            'user_id' => 'required',
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
