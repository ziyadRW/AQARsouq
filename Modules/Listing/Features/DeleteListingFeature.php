<?php

namespace Modules\Listing\Features;

use Modules\Listing\Repositories\ListingRepositoryInterface;

class DeleteListingFeature
{
    protected $listingRepository;

    public function __construct(ListingRepositoryInterface $listingRepository)
    {
        $this->listingRepository = $listingRepository;
    }

    public function handle($id)
    {
        return $this->listingRepository->deleteListing($id);
    }
}
