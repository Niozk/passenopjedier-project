<?php

namespace App\Http\Controllers;

use App\Models\PetSitter;
use App\Models\PetSitterPicture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PetSitterController extends Controller
{
    public function index()
    {
        $petSitters = PetSitter::with('pictures')->get();
        return response()->json($petSitters);
    }

    public function show($id)
    {
        $petSitter = PetSitter::with('pictures')->findOrFail($id);
        return response()->json($petSitter);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'name' => 'required|string',
            'description' => 'required|string',
            'hourly_rate' => 'numeric',
            'pictures.*' => 'image|mimes:jpeg,png,jpg',
        ]);
    
        $petSitter = PetSitter::create([
            'user_id' => $request->user_id,
            'name' => $request->name,
            'description' => $request->description,
            'hourly_rate' => $request->hourly_rate,
        ]);

        if ($request->hasFile('pictures')) {
            foreach ($request->file('pictures') as $picture) {
                $path = 'uploads/pet-sitter/';
                $filename = time() . '_' . $picture->getClientOriginalName();

                $picture->move($path, $filename);

                $petSitter->pictures()->create([
                    'url' => $filename,
                ]);
            }
        }

        return response()->json($petSitter, 201);
    }

    public function destroy($id)
    {
        $petSitter = PetSitter::findOrFail($id);
        $petSitter->delete();

        return response()->json(null, 204);
    }
    
    public function pictures($sitterId)
    {
        $petSitter = PetSitter::with('pictures')->findOrFail($sitterId);

        $pictureUrls = $petSitter->pictures->map(function ($picture) {
            return asset('uploads/pet-sitter/' . $picture->url);
        });

        return response()->json($pictureUrls);
    }

    public function filter(Request $request)
    {
        $query = PetSitter::query();

        if ($request->filled('name')) {
            $query->whereRaw('LOWER(name) LIKE ?', ['%' . strtolower($request->input('name')) . '%']);
        }
        if ($request->filled('min_rate') && $request->filled('max_rate')) {
            $query->whereBetween('hourly_rate', [$request->input('min_rate'), $request->input('max_rate')]);
        }
    
        return response()->json($query->get());
    }
}
