<?php

namespace App\DataFixtures;

use App\Entity\Race;
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
        $user4 = $this->createUser('matt', 'matt');
        $user5 = $this->createUser('leonardo', 'leonardo');

        $race1 = $this->createRace(1, $user1,"9:25", true);
        $race2 = $this->createRace(1, $user2,"8:13", false);
        $race3 = $this->createRace(1, $user3,"10:47", true);
        $race4 = $this->createRace(1, $user4,"7:07", true);
        $race5 = $this->createRace(1, $user5,"12:36", false);

        $race6 = $this->createRace(2, $user4,"5:12", false);
        $race7 = $this->createRace(2, $user1,"7:01", true);
        $race8 = $this->createRace(2, $user5,"4:35", true);
        $race9 = $this->createRace(2, $user2,"9:24", false);
        $race10 = $this->createRace(2, $user3,"8:11", true);

        $race11 = $this->createRace(3, $user3,"14:57", true);
        $race12 = $this->createRace(3, $user5,"17:41", false);
        $race13 = $this->createRace(3, $user1,"19:13", false);
        $race14 = $this->createRace(3, $user4,"15:43", true);
        $race15 = $this->createRace(3, $user2,"13:28", true);

        $manager->persist($user1);
        $manager->persist($user2);
        $manager->persist($user3);
        $manager->persist($user4);
        $manager->persist($user5);

        $manager->persist($race1);
        $manager->persist($race2);
        $manager->persist($race3);
        $manager->persist($race4);
        $manager->persist($race5);

        $manager->persist($race6);
        $manager->persist($race7);
        $manager->persist($race8);
        $manager->persist($race9);
        $manager->persist($race10);

        $manager->persist($race11);
        $manager->persist($race12);
        $manager->persist($race13);
        $manager->persist($race14);
        $manager->persist($race15);

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

    private function createRace($track, $user, $time, $completion):Race
    {
        $race = new Race();
        $race->setTrack($track);
        $race->setUser($user);
        $race->setTime($time);
        $race->setCompletion($completion);
        return $race;
    }
}
