<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Party;

class PartyController extends Controller
{
    public function index()
    {
        $parties = Party::all();
        return view('admin.parties.index', compact('parties'));
    }

    public function search(Request $request)
    {
        $partyName = $request->input('party_name');
        $parties = Party::where('name', 'like', '%' . $partyName . '%')->get();
        return view('admin.parties.index', compact('parties'));
    }
    public function create()
{
    return view('admin.parties.create');
}

public function store(Request $request)
{
    $validatedData = $request->validate([
        'date' => 'required|date',
        'name' => 'required|string|max:255',
        'location' => 'required|string|max:255',
        'type' => 'required|string',
        'participants' => 'required|integer',
        'details' => 'nullable|string',
        'image1' => 'nullable|image',
        'image2' => 'nullable|image',
        'image3' => 'nullable|image',
    ]);

    // เก็บข้อมูลภาพที่อัพโหลด
    $images = [];
    for ($i = 1; $i <= 3; $i++) {
        if ($request->hasFile('image' . $i)) {
            $images[] = $request->file('image' . $i)->store('party_images', 'public');
        }
    }

    Party::create([
        'date' => $validatedData['date'],
        'name' => $validatedData['name'],
        'location' => $validatedData['location'],
        'type' => $validatedData['type'],
        'participants' => $validatedData['participants'],
        'details' => $validatedData['details'],
        'images' => json_encode($images),
    ]);

    return redirect()->route('admin.parties.index')->with('success', 'Party created successfully!');
}

}
