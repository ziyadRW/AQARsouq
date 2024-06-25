<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RealtorListingController extends Controller
{

    public function __construct()
    {
        //$this->middleware('auth')->except((['index', 'show']));

        // this will run $this->authorize('listing') auto for everyone
        $this->authorizeResource(Listing::class, 'listing');
    }

    public function index(){

        return inertia('Realtor/Index',[
            'listings' => Auth::user()->listings
        ]
    );
    }

    public function create()
    {
        // Your logic for showing the create form
    }

    public function store(Request $request)
    {
        // Your logic for storing a new listing
    }

    public function show(Listing $listing)
    {
        // Your logic for showing a single listing
    }

    public function edit(Listing $listing)
    {
        // Your logic for showing the edit form
    }

    public function update(Request $request, Listing $listing)
    {
        // Your logic for updating the listing
    }

    public function destroy(Listing $listing)
    {
        $listing->deleteOrFail();

        return redirect()->back()->with('success', 'Listing was deleted successfully');
    }
}
