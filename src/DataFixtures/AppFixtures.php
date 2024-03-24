<?php

// src/DataFixtures/AppFixtures.php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        // Cria o usuário administrador
        $adminUser = new User();
        $adminUser->setEmail('admin'); // Ou setEmail, dependendo da sua entidade User
        $adminUser->setRoles(['ROLE_ADMIN']);

        // Hash da senha 'admin'
        $hashedPassword = $this->passwordHasher->hashPassword(
            $adminUser,
            'admin'
        );
        $adminUser->setPassword($hashedPassword);

        $manager->persist($adminUser);
        $manager->flush();
    }
}
