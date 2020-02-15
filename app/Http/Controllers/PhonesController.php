<?php

namespace App\Http\Controllers;

use App\Phone;
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
    public function store()
    {
        $data = $this->validateRequest();

        $phone = Phone::create($data);

        return redirect($phone->path());
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
    public function destroy(Phone $phone)
    {
        $phone->delete();

        return redirect('/phone');
    }

    /**
     * phone required data
     *
     * @return array
     */
    protected function validateRequest()
    {
        return request()->validate([
            'user_id' => 'required',
            'phone_type' => 'required',
            'phone_number' => 'required'
        ]);
    }
}
