<?php

namespace App\Dto\User;

use ApiPlatform\Metadata\ApiProperty;
use DateTimeImmutable;

class UserDetailOutput
{
    public function __construct(
        #[ApiProperty(schema: [
            'type' => "string",
            'description' => "Id de l'utilisateur",
            'format' => "uuid",
        ])]
        public string $id,

        #[ApiProperty(schema: [
            'type' => "string",
            'description' => "Email de l'utilisateur",
            'format' => "email",
        ])]
        public string $email,

        #[ApiProperty(schema: [
            'type' => "string",
            'description' => "Prenom de l'utilisateur",
            'format' => "string",
        ])]
        public ?string $firstName,

        #[ApiProperty(schema: [
            'type' => "string",
            'description' => "Nom de famille de l'utilisateur",
            'format' => "string",
        ])]
        public ?string $lastName,

        public DateTimeImmutable $createdAt,
    )
    {
    }
}
