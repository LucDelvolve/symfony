<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 50; $i++) {
            $user = (new User())
                ->setLastname($faker->lastName)
                ->setFirstname($faker->firstName)
                ->setEmail($faker->email)
                ->setPassword('string')
                ->setGender($faker->randomElement(User::GENDER))
            ;

            $user->setPassword($this->passwordEncoder->encodePassword(
                $user,
                'string'
            ));

            $manager->persist($user);
        }

        $user = (new User())
            ->setLastname($faker->lastName)
            ->setFirstname($faker->firstName)
            ->setEmail('user@admin')
            ->setPassword('string')
            ->setRoles(['ROLE_ADMIN'])
            ->setGender($faker->randomElement(User::GENDER))
        ;

        $user->setPassword($this->passwordEncoder->encodePassword(
            $user,
            'string'
        ));

        $manager->persist($user);

        $manager->flush();
    }
}
