<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStatusRequest;
use App\Http\Resources\StatusesResource;
use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function index()
    {
        return response()->json([
            'message' => 'Retrieved successfully',
            'data' => StatusesResource::collection(
                Status::paginate(15)
            )
        ]);
    }

    public function update(Request $request, $id)
    {
        $theStatus = Status::find($id);

        $theStatus->type = $request->type;
        $theStatus->name = $request->name;

        $theStatus->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Status successfully updated!',
            'updatedStatus' => $theStatus
        ], 200);
    }

    public function store(StoreStatusRequest $request)
    {
        $newStatus = Status::create([
            'type' => $request->type,
            'name' => $request->name
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Status successfully created!',
            'createdStatus' => $newStatus
        ], 201);
    }

    public function destroy($id)
    {
        Status::find($id)->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Status successfully deleted!',
        ], 200);
    }
}
