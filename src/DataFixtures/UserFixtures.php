<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture

{
    protected $faker;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {

        $user = new User();
        $this->faker = Factory::create();
        $encoded = $this->encoder->encodePassword($user, 'azerty');
        $user->setEmail('yann-berlingeri@hotmail.fr')->setFirstname('yann')->setLastname('Berlingeri')->setPassword($encoded);
        $manager->persist($user);
        $manager->flush();
    }
}
