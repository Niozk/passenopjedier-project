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

        $petSittingRequest->update($validatedData);

        return response()->json($petSittingRequest, 200);
    }

    public function destroy($id)
    {
        $petSittingRequest = PetSittingRequest::findOrFail($id);
        $petSittingRequest->delete();
        return response()->json(null, 204);
    }

    public function picture($requestId)
    {
        $petSittingRequest = PetSittingRequest::findOrFail($requestId);

        $pictureUrl = $petSittingRequest->picture ? asset('uploads/pet-sitting-request/' . $petSittingRequest->picture) : null;

        return response()->json(['url' => $pictureUrl]);
    }

    public function filter(Request $request)
    {
        $query = PetSittingRequest::query();

        if ($request->filled('pet_name')) {
            $query->whereRaw('LOWER(pet_name) LIKE ?', ['%' . strtolower($request->input('pet_name')) . '%']);
        }
        if ($request->filled('species')) {
            $query->whereRaw('LOWER(species) LIKE ?', ['%' . strtolower($request->input('species')) . '%']);
        }
        if ($request->filled('breed')) {
            $query->whereRaw('LOWER(breed) LIKE ?', ['%' . strtolower($request->input('breed')) . '%']);
        }
        if ($request->filled('age')) {
            $query->where('age', $request->input('age'));
        }
        if ($request->filled('min_rate') && $request->filled('max_rate')) {
            $query->whereBetween('hourly_rate', [$request->input('min_rate'), $request->input('max_rate')]);
        }
    
        return response()->json($query->get());
    }
    
}
