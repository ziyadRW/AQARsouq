<?php

namespace Modules\Listing\Features;

use Modules\Listing\Repositories\ListingRepositoryInterface;

class UpdateListingFeature
{
    protected $listingRepository;

    public function __construct(ListingRepositoryInterface $listingRepository)
    {
        $this->listingRepository = $listingRepository;
    }

    public function handle($id, array $data)
    {
        $validatedData = $this->validate($data);
        return $this->listingRepository->updateListing($id, $validatedData);
    }

    protected function validate(array $data)
    {
        return validator($data, [
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
        ])->validate();
    }
}
