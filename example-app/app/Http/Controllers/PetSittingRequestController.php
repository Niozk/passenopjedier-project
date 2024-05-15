<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PetSittingRequest;

class PetSittingRequestController extends Controller
{
    public function index()
    {
        $petSittingRequests = PetSittingRequest::all();
        return response()->json($petSittingRequests);
    }
    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'pet_name' => 'required|string|max:255',
            'species' => 'required|string|max:255',
            'breed' => 'nullable|string|max:255',
            'age' => 'nullable|integer',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'hourly_rate' => 'required|numeric',
            'picture' => 'nullable|mimes:jpeg,png,jpg',
        ]);

        $path = 'uploads/pet-sitting-request/';
        $filename = null;

        if ($request->has('picture')) {
            $file = $request->file('picture');
            $extension = $file->getClientOriginalExtension();

            $filename = time().'.'.$extension;
            $file->move($path, $filename);

            $validatedData['picture'] = $filename;
        }

        $petSittingRequest = PetSittingRequest::create($validatedData);

        return response()->json($petSittingRequest, 201);
    }

    public function show($id)
    {
        $petSittingRequest = PetSittingRequest::findOrFail($id);
        return response()->json($petSittingRequest);
    }

    public function update(Request $request, $id)
    {
        $petSittingRequest = PetSittingRequest::findOrFail($id);

        $validatedData = $request->validate([
            'pet_name' => 'string|max:255',
            'species' => 'string|max:255',
            'breed' => 'nullable|string|max:255',
            'age' => 'nullable|integer',
            'description' => 'nullable|string',
            'start_date' => 'date',
            'end_date' => 'date|after:start_date',
            'hourly_rate' => 'numeric',
            'picture' => 'nullable|mimes:jpeg,png,jpg',
        ]);

        // if ($request->hasFile('picture')) {
        //     $file = $request->file('picture');
        //     $filename = time() . '.' . $file->getClientOriginalExtension();
        //     $path = 'uploads/pet-sitting/';
        //     $file->move(public_path($path), $filename);
        //     $validatedData['picture'] = $path . $filename;
        // }

        
        $petSittingRequest->update($validatedData);

        return response()->json($petSittingRequest, 200);
    }

    public function destroy($id)
    {
        $petSittingRequest = PetSittingRequest::findOrFail($id);
        $petSittingRequest->delete();
        return response()->json(null, 204);
    }
}
