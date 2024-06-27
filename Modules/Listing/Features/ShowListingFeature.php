<?php

namespace Modules\Listing\Features;

use Modules\Listing\Repositories\ListingRepositoryInterface;

class ShowListingFeature
{
    protected $listingRepository;

    public function __construct(ListingRepositoryInterface $listingRepository)
    {
        $this->listingRepository = $listingRepository;
    }

    public function handle($id)
    {
        return $this->listingRepository->getListingById($id);
    }
}
