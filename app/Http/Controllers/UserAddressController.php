<?php

use App\Request\StoreUserAddresses;
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserAddressController extends Controller
{
    public function store(StoreUserAddresses $request)
    {
        $userAddress = UserAddress::create([
            'first_name' => $request->firstName,
            'last_name' => $request->lastName,
            'phone_number' => $request->phoneNumber,
            'address_line_1' => $request->addressLineOne,
            'address_line_2' => $request->addressLineTwo,
            'city' => $request->city,
            'county' => $request->county,
            'zip' => $request->zip,
            'country' => $request->country,
            'user_id' => $request->userId,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Address has been added'
        ]);
    }

    public function delete($id) 
    {
        $userAddress = UserAddress::find($id);

        $userAddress->delete();
        
        return response()->json([
            'status' => 'success',
            'message' => 'User address has been deleted'
        ]);
    }
}
