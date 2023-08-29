<?php
namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordHasherInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setEmail('admin@trackingPremium.com');

        // Hashear la contraseña utilizando Bcrypt
        $hashedPassword = $this->passwordEncoder->hashPassword($user, 'contraseña');
        $user->setPassword($hashedPassword);

        // Otros datos y roles del usuario

        $manager->persist($user);
        $manager->flush();
    }
}
