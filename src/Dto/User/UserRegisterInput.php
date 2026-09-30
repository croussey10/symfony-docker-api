<?php

namespace App\Dto\User;

use ApiPlatform\Metadata\ApiProperty;
use Symfony\Component\Validator\Constraints as Assert;

class UserRegisterInput
{
    public function __construct(
        #[Assert\NotBlank]
        #[Assert\Email]
        #[Assert\Length(min: 3, max: 255)]
        #[ApiProperty(schema: [
            'type' => 'string',
            'format' => 'email',
            'description' => 'email',
            'minLength' => 3,
            'maxLength' => 255,
            'example' => 'user@example.com',
        ], required: true)]
        public string  $email,

        #[Assert\NotBlank]
        #[Assert\PasswordStrength]
        #[Assert\Length(min: 3, max: 255)]
        #[ApiProperty(schema: [
            'type' => 'string',
            'format' => 'password',
            'description' => 'password',
            'minLength' => 8,
            'maxLength' => 255,
            'example' => 'MotDePasse123.',
        ], required: true)]
        public string $password,

        #[Assert\Length(min: 3, max: 255)]
        #[Assert\NotBlank(allowNull: true)]
        #[ApiProperty(schema: [
            'type' => 'string',
            'description' => 'firstName',
            'minLength' => 3,
            'maxLength' => 255,
            'example' => 'Jean',
        ])]
        public ?string $firstName = null,

        #[Assert\Length(min: 3, max: 255)]
        #[Assert\NotBlank(allowNull: true)]
        #[ApiProperty(schema: [
            'type' => 'string',
            'description' => 'lastName',
            'minLength' => 3,
            'maxLength' => 255,
            'example' => 'Pavois',
        ])]
        public ?string $lastName = null,
    )
    {

    }
}
