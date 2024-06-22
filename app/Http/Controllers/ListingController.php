<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return inertia(
            'Listing/Index',[
                'listings'=> Listing::all()
            ]
            );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia(
            'Listing/Create'
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $form = $request->validate([
            'headline' => 'required',
            'beds' => 'required|integer|min:0|max:99',
            'baths' => 'required|integer|min:0|max:99',
            'area' => 'required|integer|min:30|max:50000',
            'city' => 'required|string|regex:/^[a-zA-Z\s]+$/',
            'code' => 'required',
            'neighbourhood' => 'required|string|regex:/^[a-zA-Z\s]+$/',
            'street' => 'required|string|regex:/^[a-zA-Z\s]+$/',
            'description' => 'required',
            'price' => 'required|integer|min:100|max:100000000',
        ], [
            'city.regex' => 'The city field must contain only letters and spaces.',
            'neighbourhood.regex' => 'The neighbourhood field must contain only letters and spaces.',
            'street.regex' => 'The street field must contain only letters and spaces.',
        ]);
        
        $form['user_id']=auth()->id();
        
        Listing::create($form);

        return redirect('/listings')->with('success', 'Listing was created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Listing $listing)
    {
        return inertia(
            'Listing/Show',[
                'listing'=> $listing
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Listing $listing)
    {
        return inertia(
            'Listing/Edit',[
                'listing'=> $listing
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Listing $listing)
    {
        $form = $request->validate([
            'headline' => 'required',
            'beds' => 'required|integer|min:0|max:99',
            'baths' => 'required|integer|min:0|max:99',
            'area' => 'required|integer|min:30|max:50000',
            'city' => 'required|string|regex:/^[a-zA-Z\s]+$/',
            'code' => 'required',
            'neighbourhood' => 'required|string|regex:/^[a-zA-Z\s]+$/',
            'street' => 'required|string|regex:/^[a-zA-Z\s]+$/',
            'description' => 'required',
            'price' => 'required|integer|min:100|max:100000000',
        ], [
            'city.regex' => 'The city field must contain only letters and spaces.',
            'neighbourhood.regex' => 'The neighbourhood field must contain only letters and spaces.',
            'street.regex' => 'The street field must contain only letters and spaces.',
        ]);
        
        
        $listing->update($form);

        return redirect('/listings')->with('success', 'Listing was updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Listing $listing)
    {
        $listing->delete();
        redirect()->back()->with('success', 'Listing was Deleted successfully');
    }
}
