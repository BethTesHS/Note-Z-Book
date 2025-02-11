<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // The method that retrieves and displays members
    public function viewPage() {
        // $home = Home::all();  // Get all members from the database
        // return view('home', compact('home'));  // Pass the data to the view
        return view('home');  // Pass the data to the view
    }

    public function store(Request $request) {
        // // Validate the incoming request data
        // $validated = $request->validate([
        //     'firstName' => 'required|string|max:255',
        //     'lastName' => 'required|string|max:255',
        //     'id' => 'required|string|max:15|unique:members,id',
        //     'location' => 'required|string|max:100',
        //     'age' => 'required|string|max:3',
        //     'telNo' => 'required|string|max:10',
        // ]);

        // // Create a new member
        // $member = new Members();
        // $member->firstName = $validated['firstName'];
        // $member->lastName = $validated['lastName'];
        // $member->id = $validated['id'];
        // $member->age = $validated['age'];
        // $member->location = $validated['location'];
        // $member->telNo = $validated['telNo'];
        // $member->save(); // Save to the database


        // Redirect to the members index or a success page
        return redirect()->route('home')->with('success', 'Member added successfully!');
    }

    public function update(Request $request) {
        // // Validate the incoming request data
        // $validated = $request->validate([
        //     'firstName' => 'required|string|max:255',
        //     'lastName' => 'required|string|max:255',
        //     'id' => 'required|string|max:10',
        //     'location' => 'required|string|max:100',
        //     'age' => 'required|string|max:3',
        //     'telNo' => 'required|string|max:10',
        // ]);
        // // Retrieve the user record by ID
        // $member = Members::findOrFail( $validated['id']);
        // $member->firstName = $request->input('firstName');
        // $member->lastName = $request->input('lastName');
        // $member->age = $request->input('age');
        // $member->location = $request->input('location');
        // $member->telNo = $request->input('telNo');
        // $member->save(); // Save to the database


        // Redirect to the members index or a success page
        return redirect()->route('home')->with('success', 'Member added successfully!');
    }

    public function delete(Request $request) {
        // $validated = $request->validate([
        //     'id' => 'required|string|max:10',
        // ]);

        // // Find the member by ID
        // $member = Members::findOrFail( $validated['id']);

        // // Delete the member
        // $member->delete();

        // Redirect to the members page with a success message
        return redirect()->route('home')->with('success', 'Member deleted successfully');
    }
}
