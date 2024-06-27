<?php

namespace Modules\Listing\Repositories;

interface ListingRepositoryInterface
{
    public function getAllListings();
    public function getListingById($id);
    public function createListing(array $data);
    public function updateListing($id, array $data);
    public function deleteListing($id);
    public function filterListings(array $filters);
}
