<?php

namespace Modules\Listing\Features;

use Modules\Listing\Repositories\ListingRepositoryInterface;

class ListListingsFeature
{
    protected $listingRepository;

    public function __construct(ListingRepositoryInterface $listingRepository)
    {
        $this->listingRepository = $listingRepository;
    }

    public function handle(array $filters)
    {
        return $this->listingRepository->filterListings($filters);
    }
}
