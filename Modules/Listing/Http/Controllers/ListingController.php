<?php

namespace Modules\Listing\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Modules\Listing\Entities\Listing;
use Modules\Listing\Features\CreateListingFeature;
use Modules\Listing\Features\DeleteListingFeature;
use Modules\Listing\Features\ListListingsFeature;
use Modules\Listing\Features\ShowListingFeature;
use Modules\Listing\Features\UpdateListingFeature;
use Illuminate\Support\Facades\Auth;

class ListingController extends Controller
{
    use AuthorizesRequests;

    public function __construct(
        protected CreateListingFeature $createListingFeature,
        protected UpdateListingFeature $updateListingFeature,
        protected DeleteListingFeature $deleteListingFeature,
        protected ShowListingFeature $showListingFeature,
        protected ListListingsFeature $listListingsFeature
    ) {
        // $this->authorizeResource(Listing::class, 'listing');
    }

    public function manage()
    {
        
        logger()->info('Managing listings for user:', ['user' => Auth::user()]);
        return inertia('Listing/Manage', [
            'listings' => Auth::user()->listings,
        ]);
    }

    public function index(Request $request)
    {
        $filters = $request->only(['priceFrom', 'priceTo', 'beds', 'baths', 'areaFrom', 'areaTo']);
        $listings = $this->listListingsFeature->handle($filters);

        return inertia('Listing/Index', [
            'filters' => $filters,
            'listings' => $listings,
        ]);
    }

    public function create()
    {
        logger()->info('Creating a new listing');
        return inertia('Listing/Create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $this->createListingFeature->handle($data);

        return redirect('/listings')->with('success', 'Listing was created successfully');
    }

    public function show(Listing $listing)
    {
        logger()->info('Showing listing:', ['listing' => $listing]);
        $listing = $this->showListingFeature->handle($listing->id);
    
        return inertia('Listing/Show', [
            'listing' => $listing,
        ]);
    }
    

    public function edit(Listing $listing)
    {
        $listing = $this->showListingFeature->handle($listing->id);

        return inertia('Listing/Edit', [
            'listing' => $listing,
        ]);
    }

    public function update(Request $request, Listing $listing)
    {
        $data = $request->all();
        $this->updateListingFeature->handle($listing->id, $data);

        return redirect('/listings')->with('success', 'Listing was updated successfully');
    }

    public function destroy(Listing $listing)
    {
        $this->deleteListingFeature->handle($listing->id);

        return redirect('/listings')->with('success', 'Listing was deleted successfully');
    }


}
