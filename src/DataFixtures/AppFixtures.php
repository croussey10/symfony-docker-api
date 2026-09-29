<?php

namespace App\DataFixtures;

use App\Entity\City;
use App\Entity\User;
use DateTimeImmutable;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private const PLAIN_PASSWORD = 'motdepasse';

    public function __construct(
        private readonly userPasswordHasherInterface $hasher
    )
    {

    }

    public function load(ObjectManager $manager): void
    {
        #region Users
        $aliceUser = new User()
            ->setEmail('alice@example.fr')
            ->setCreatedAt(new DateTimeImmutable());

        $password = $this->hasher->hashPassword($aliceUser, self::PLAIN_PASSWORD);
        $aliceUser->setPassword($password);

        $manager->persist($aliceUser);

        $bobUser = new User()
            ->setEmail('bob@example.fr')
            ->setCreatedAt(new DateTimeImmutable());

        $password = $this->hasher->hashPassword($bobUser, self::PLAIN_PASSWORD);
        $bobUser->setPassword($password);

        $manager->persist($bobUser);

        $camilleUser = new User()
            ->setFirstname('Camille')
            ->setLastname('Aubert')
            ->setEmail('camille@example.fr')
            ->setCreatedAt(new DateTimeImmutable("2026-02-04T09:00:00"));

        $password = $this->hasher->hashPassword($camilleUser, self::PLAIN_PASSWORD);
        $camilleUser->setPassword($password);

        $manager->persist($camilleUser);

        #endregion Users

        #region Cities

        $cities = [
            'Paris',
            'Lyon',
            'Marseille',
            'Bordeaux',
            'Lille',
            'Strasbourg',
            'Toulouse',
            'Nantes',
            'Dijon',
            'Brest'
        ];

        foreach ($cities as $cityName) {
            $city = new City()
                ->setName($cityName)
                ->setCreatedAt(new DateTimeImmutable());

            $manager->persist($city);
        }

        #endregion Cities

        $manager->flush();
    }
}
