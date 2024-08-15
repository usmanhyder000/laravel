<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'phone' => 'required|string',
        ]);

        $contact = Contact::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'phone' => $request->phone,
        ]);

        return response()->json($contact);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'phone' => 'required|string',
        ]);

        $contact = Contact::findOrFail($id);
        $contact->update([
            'name' => $request->name,
            'phone' => $request->phone,
        ]);

        return response()->json($contact);
    }

    public function delete($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return response()->json(['message' => 'Contact deleted']);
    }

    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        return response()->json($contact);
    }

    public function index()
    {
        $contacts = Contact::where('user_id', Auth::id())->get();
        return response()->json($contacts);
    }

    public function search(Request $request)
    {
        $request->validate(['query' => 'required|string']);
        $contacts = Contact::where('user_id', Auth::id())
            ->where('name', 'like', '%' . $request->query . '%')
            ->get();

        return response()->json($contacts);
    }
}

