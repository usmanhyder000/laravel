<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{

public function index(Request $request)
{
    $contacts = Contact::forUser($request->user()->id)->get();
    return response()->json($contacts);
}

public function show(Request $request, $id)
{
    $contact = Contact::forUser($request->user()->id)->findOrFail($id);
    return response()->json($contact);
}

    


public function store(Request $request)
  {
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:contacts',
        'phone' => 'required|string|max:15',
        'picture' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $path = $request->file('picture') ? $request->file('picture')->store('public/pictures') : null;

    $contact = Contact::create([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'phone' => $request->input('phone'),
        'picture' => $path,
    ]);

    return response()->json($contact, 201);
  }

public function update(Request $request, $id)
{
    $contact = Contact::findOrFail($id);

    $request->validate([
        'name' => 'nullable|string|max:255',
        'email' => 'nullable|email',
        'phone' => 'nullable|string|max:15',
        'picture' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $path = $request->file('picture') ? $request->file('picture')->store('public/pictures') : $contact->picture;

    $contact->update([
        'name' => $request->input('name', $contact->name),
        'email' => $request->input('email', $contact->email),
        'phone' => $request->input('phone', $contact->phone),
        'picture' => $path,
    ]);

    return response()->json($contact, 200);
}



    public function destroy($id)
    {
        $contact = auth()->user()->contacts()->findOrFail($id);
        $contact->delete();
        return response()->json(['message' => 'Contact deleted']);
    }

    public function search(Request $request)
    {
        $contacts = auth()->user()->contacts()->where('name', 'LIKE', "%{$request->search}%")->get();
        return response()->json($contacts);
    }
}

