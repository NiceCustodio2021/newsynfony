<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture

{
    public function __construct(
        private UserPasswordHasherInterface $hasher
    ){}
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $user = new User();
        $user->setPrenom('user')
            ->setNom('BK')
            ->setAge(50)
            ->setUsername('user')
            ->setEmail('user@user.com')
            ->setPassword($this->hasher->hashpassword($user,'u1234'))
            ->setRoles(["ROLE_ADMIN"])
            ->setVille('VALENCE');

        $manager->persist($user);

        $manager->flush();
    }
}
