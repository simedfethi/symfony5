<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        for($i=2000;$i<=2010;$i++)
        {
            $user = new User();
            $user->setName('name'. $i);
            $user->setLastname('lastname' . $i);
            $manager->persist($user);
        }
            $manager->flush();
    }
}
