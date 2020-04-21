<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\User;

class AppFixtures extends Fixture
{

    private $passwordEncoder;
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $user1 = $this->createUser('admin', 'admin', 'ROLE_ADMIN');
        $user2 = $this->createUser('staff', 'staff', 'ROLE_STAFF');
        $user3 = $this->createUser('user', 'user');

        $manager->persist($user1);
        $manager->persist($user2);
        $manager->persist($user3);

        $manager->flush();
    }

    private function createUser($username, $plainPassword, $role = 'ROLE_USER'):User
    {
        $user = new User();
        $user->setUsername($username);
        $user->setRole($role);
        $encodedPassword = $this->passwordEncoder->encodePassword($user, $plainPassword);
        $user->setPassword($encodedPassword);
        return $user;
    }
}
