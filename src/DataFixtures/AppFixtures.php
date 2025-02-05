<?php

namespace App\DataFixtures;

use App\Entity\Teacher;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Factory\TeacherFactory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        // $teacher  = new Teacher;
        // $teacher->setName("Afaq");
        // $teacher->setFatherName("Shaukat");
        // $teacher->setEmail("afaq@drupak.com");
        // $teacher->setAddress("Peshawar");
        // $teacher->setContactNumber(32301);
        // $manager->persist($teacher);

        // $teacher2  = new Teacher;
        // $teacher2->setName("Waseem");
        // $teacher2->setFatherName("Mujeeb");
        // $teacher2->setEmail("waseem@drupak.com");
        // $teacher2->setAddress("Peshawar");
        // $teacher2->setContactNumber(3121);
        // $manager->persist($teacher2);
        // $manager->flush();
        TeacherFactory::createMany(20);
    }
}