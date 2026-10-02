<?php

namespace App\Service;

use App\Dto\Trip\TripListOutput;
use App\Dto\Trip\TripSearchInput;
use App\Entity\Trip;
use App\Exception\Trip\TripNotFoundException;
use App\Repository\TripRepository;
use DateTimeImmutable;
use Symfony\Component\Uid\Uuid;
use TripDetailsOutput;

class TripService
{
    public function __construct(
        private readonly TripRepository $tripRepository,
        private readonly CityService $cityService,
    )
    {
    }

    /**
     * Returns the trips flying the submitted route on the submitted day.
     *
     * @return Trip[]
     *
     * @throws \DateMalformedStringException
     */
    public function search(TripSearchInput $input): array
    {
        $origin = $this->cityService->findOneById(Uuid::fromString($input->origin));
        $destination = $this->cityService->findOneById(Uuid::fromString($input->destination));

        $date = new DateTimeImmutable($input->date);

        return $this->tripRepository->search($origin, $destination, $date);
    }

    public function toList(Trip $trip): TripListOutput
    {
        return new TripListOutput(
            $trip->getId(),
            $this->cityService->toList($trip->getOrigin()),
            $this->cityService->toList($trip->getDestination()),
            $trip->getDepartureAt(),
            $trip->getDuration(),
            $trip->getPrice(),
        );
    }

    public function toDetails(Trip $trip): TripDetailsOutput
    {
        return new TripDetailsOutput(
            id: $trip->getId(),
            origin: $this->cityService->toList($trip->getOrigin()),
            destination: $this->cityService->toList($trip->getDestination()),
            departureAt: $trip->getDepartureAt(),
            duration: $trip->getDuration(),
            price: $trip->getPrice(),
            maxBaggageWeightKg: $trip->getCatapultModel()->maxBaggageWeightKg(),
            catapultModel: $trip->getCatapultModel()->name,
            boardingInfo: $trip->getBoardingInfo(),
        );
    }

    /**
     * @throws TripNotFoundException when no trip carries this identifier
     */
    public function findOneById(Uuid $id): Trip
    {
        $found = $this->tripRepository->find($id);

        if (!$found) {
            throw new TripNotFoundException();
        }

        return $found;
    }
}
