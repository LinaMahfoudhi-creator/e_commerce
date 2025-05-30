<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixure extends Fixture
{   public function __construct(
    private UserPasswordHasherInterface $passwordHasher
)
{}
    public function load(ObjectManager $manager): void
    {
        $Admin1=new user();
        $Admin1->setEmail('admin1@gmail.com');
        $Admin1->setUsername('admin1');
        $Admin1->setPassword($this->passwordHasher->hashPassword($Admin1, 'admin1'));
        $Admin1->setRoles(['ROLE_ADMIN']);
        $Admin2=new user();
        $Admin2->setEmail('admin2@gmail.com');
        $Admin2->setUsername('admin2');
        $Admin2->setPassword($this->passwordHasher->hashPassword($Admin2, 'admin2'));
        $Admin2->setRoles(['ROLE_ADMIN']);
        $manager->persist($Admin1);
        $manager->persist($Admin2);
        $manager->flush();
    }

}
