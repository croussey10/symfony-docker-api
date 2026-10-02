<?php

namespace App\Dto\Trip;

use ApiPlatform\Metadata\ApiProperty;
use Symfony\Component\Validator\Constraints as Assert;

class TripSearchInput
{
    public function __construct(
        #[Assert\NotBlank]
        #[Assert\Uuid]
        #[ApiProperty(schema: [
            'type' => 'string',
            'format' => 'uuid',
            'description' => "UUID de la ville d'origine"
        ])]
        public ?string $origin = null,

        #[Assert\NotBlank]
        #[Assert\Uuid]
        #[ApiProperty(schema: [
            'type' => 'string',
            'format' => 'uuid',
            'description' => "UUID de la ville de destination"
        ])]
        public ?string $destination = null,

        #[Assert\NotBlank]
        #[Assert\Date]
        #[ApiProperty(schema: [
            'type' => 'string',
            'format' => 'date',
            'description' => "Date du voyage"
        ])]
        public ?string $date = null,

        #[Assert\NotBlank]
        #[Assert\Positive]
        #[ApiProperty(schema: [
            'type' => 'integer',
            'description' => "Nombre de passager"
        ])]
        public ?int $passengers = null,
    )
    {

    }
}
