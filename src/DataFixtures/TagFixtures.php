<?php

namespace App\DataFixtures;

use App\Entity\Tag;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class TagFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 50; $i++) {
            $tag = (new Tag())
                ->setName($faker->sentence(1))
            ;

            $manager->persist($tag);
        }

        $manager->flush();
    }
}
