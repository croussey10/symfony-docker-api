<?php

namespace App\Dto\Trip;

use ApiPlatform\Metadata\ApiProperty;
use App\Dto\City\CityListOutput;
use Symfony\Component\Uid\Uuid;

class TripListOutput
{
    public function __construct(
        #[ApiProperty(schema: [
            'type' => "string",
            'description' => "Id du lancer",
            'format' => "uuid",
        ])]
        public readonly Uuid $id,

        #[ApiProperty(schema: [
            'description' => "Ville de départ",
        ])]
        public readonly CityListOutput $origin,

        #[ApiProperty(schema: [
            'description' => "Ville de destination",
        ])]
        public readonly CityListOutput $destination,

        #[ApiProperty(schema: [
            'type' => "string",
            'description' => "Date de départ",
            'format' => "date-time",
        ])]
        public readonly \DateTimeImmutable $departureAt,

        #[ApiProperty(schema: [
            'type' => "integer",
            'description' => "Durée du trajet",
        ])]
        public readonly int $duration,

        #[ApiProperty(schema: [
            'type' => "integer",
            'description' => "Prix du trajet",
        ])]
        public readonly int $price,
    ) {
    }
}
