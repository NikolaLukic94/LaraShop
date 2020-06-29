<?php

namespace App\Http\Controllers;

use App\Models\UserAddress;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreUserAddresses;
use App\Http\Requests\UpdateUserAddresses;
use App\Http\Resources\UserAddresses as UserAddressesResource;

use Illuminate\Http\Request;

class UserAddressController extends Controller
{
    public function getAll()
    {
        $addresses = Auth::user()->addresses;
        //return collection of articles as a resource
        return UserAddressesResource::collection($addresses);
    }
    // StoreUserAddresses
    public function store(Request $request)
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
            'user_id' => Auth::id()
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Address has been added'
        ]);
    }
    // UpdateUserAddresses
    public function update(Request $request)
    {
        $userAddress = UserAddress::find($id);

        $userAddress->first_name = $request->firstName;
        $userAddress->last_name = $request->lastName;
        $userAddress->phone_number = $request->phoneNumber;
        $userAddress->address_line_1 = $request->addressLineOne;
        $userAddress->address_line_2 = $request->addressLineTwo;
        $userAddress->city = $request->city;
        $userAddress->county = $request->county;
        $userAddress->zip = $request->zip;
        $userAddress->country = $request->country;
        $userAddress->user_id = $request->userId;

        $userAddress->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Address has been updated'
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
