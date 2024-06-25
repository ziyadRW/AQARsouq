<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth')->except((['index', 'show']));

        // this will run $this->authorize('listing') auto for everyone
        $this->authorizeResource(Listing::class, 'listing');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        
        $filters = $request->only(['priceFrom', 'priceTo', 'beds', 'baths', 'areaFrom', 'areaTo']);


/*      Another way of doing it :

        if($filters['priceFrom'] ?? false){
            $query->where('price', '>=', $filters['priceFrom']);
        }
        if($filters['priceTo'] ?? false){
            $query->where('price', '<=', $filters['priceTo']);
        }

        if($filters['beds'] ?? false){
            $query->where('beds', $filters['beds']);
        }
        if($filters['baths'] ?? false){
            $query->where('baths', $filters['baths']);
        }

        if($filters['areaFrom'] ?? false){
            $query->where('area', '>=', $filters['areaFrom']);
        }
        if($filters['areaTo'] ?? false){
            $query->where('area', '<=', $filters['areaTo']);
        } */

        return inertia(
            'Listing/Index',[
                'filters'=> $filters,
                'listings'=> Listing::latest()->filter($filters)->paginate(6)->withQueryString()
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Listing/Create');
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

        $form['user_id'] = auth()->id();

        Listing::create($form);

        return redirect('/listings')->with('success', 'Listing was created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Listing $listing)
    {
        return inertia('Listing/Show', [
            'listing' => $listing
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Listing $listing)
    {
        return inertia('Listing/Edit', [
            'listing' => $listing
        ]);
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
}
