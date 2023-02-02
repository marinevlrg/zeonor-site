<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    public static int $userIndex = 0;

    public const USER_INFOS = [
        [
            'email' => 'marine@zeonor.com',
            'password' => 'mdpadmin'
        ],
        [
            'email' => 'sylvie@zeonor.com',
            'password' => 'mdpadmin'
        ],
    ];


    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        foreach (self::USER_INFOS as $userInfo) {
            self::$userIndex++;
            $user = new User();
            $user->setEmail($userInfo['email']);

            $hashedPassword = $this->passwordHasher->hashPassword(
                $user,
                $userInfo['password']
            );
            $user->setPassword($hashedPassword);

        }
        $manager->flush();
    }
}
