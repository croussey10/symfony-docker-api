<?php

namespace App\State\User;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProcessorInterface;
use App\Service\UserService;

class UserRegisterProcessor implements ProcessorInterface
{
    public function __construct(
        private readonly UserService $userService
    )
    {
    }

    public function process(mixed $data, Operation $operation, array $uriVariables = [], array $context = []): mixed
    {
        $user = $this->userService->register($data);

        return $this->userService->toDetails($user);
    }
}
