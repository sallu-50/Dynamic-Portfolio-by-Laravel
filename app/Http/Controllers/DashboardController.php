<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        return view('dashboard', compact('contacts'));
    }
    // public function delete(Contact $contact)
    // {
    //     // $contact->delete();
    //     $contact->forceDelete();
    //     return back()->with('success', 'data deleted successfully');
    // }
    public function destroy(Request $request, Contact $id)
    {


        $id->delete();
        return back()->with('success', 'data deleted successfully');
    }
}
