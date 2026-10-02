<?php

use ApiPlatform\Metadata\ApiProperty;
use App\Dto\City\CityListOutput;
use App\Dto\Trip\TripListOutput;
use Symfony\Component\Uid\Uuid;

final class TripDetailsOutput extends TripListOutput
{
    public function __construct(
        Uuid $id,
        CityListOutput $origin,
        CityListOutput $destination,
        \DateTimeImmutable $departureAt,
        int $duration,
        int $price,
        #[ApiProperty(schema: [
            'type' => "integer",
            'description' => "Poid maximum de bagage",
            'minimum' => 0,
        ])]
        public readonly int $maxBaggageWeightKg,

        #[ApiProperty(schema: [
            'type' => "string",
            'description' => "Modèle de la catapulte",
        ])]
        public readonly string $catapultModel,

        #[ApiProperty(schema: [
            'type' => "string",
            'description' => "Consignes de sécurité",
        ])]
        public readonly string $boardingInfo,
    )
    {
        parent::__construct($id, $origin, $destination, $departureAt, $duration, $price);
    }

}
