<?php

namespace Modules\Listing\Repositories;

use Modules\Listing\Entities\Listing;

class ListingRepository implements ListingRepositoryInterface
{
    public function getAllListings()
    {
        return Listing::all();
    }

    public function getListingById($id)
    {
        return Listing::findOrFail($id);
    }

    public function createListing(array $data)
    {
        return Listing::create($data);
    }

    public function updateListing($id, array $data)
    {
        $listing = Listing::findOrFail($id);
        $listing->update($data);
        return $listing;
    }

    public function deleteListing($id)
    {
        $listing = Listing::findOrFail($id);
        return $listing->delete();
    }

    public function filterListings(array $filters)
    {
        $query = Listing::query();

        if (isset($filters['priceFrom'])) {
            $query->where('price', '>=', $filters['priceFrom']);
        }
        if (isset($filters['priceTo'])) {
            $query->where('price', '<=', $filters['priceTo']);
        }
        if (isset($filters['beds'])) {
            $query->where('beds', '=', $filters['beds']);
        }
        if (isset($filters['baths'])) {
            $query->where('baths', '=', $filters['baths']);
        }
        if (isset($filters['areaFrom'])) {
            $query->where('area', '>=', $filters['areaFrom']);
        }
        if (isset($filters['areaTo'])) {
            $query->where('area', '<=', $filters['areaTo']);
        }

        return $query->paginate(6)->appends(request()->query());
    }
}
