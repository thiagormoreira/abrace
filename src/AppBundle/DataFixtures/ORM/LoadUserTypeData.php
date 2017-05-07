<?php
// src/AppBundle/DataFixtures/ORM/LoadUserTypeData.phpata.php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\UserType;

class LoadUserTypeData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $userType = new UserType();
        $userType->setName('Administrador');
    
        $manager->persist($userType);
        $manager->flush();
    
        $userType = new UserType();
        $userType->setName('Editor');
    
        $manager->persist($userType);
        $manager->flush();
    
        $userType = new UserType();
        $userType->setName('Usuario');
    
        $manager->persist($userType);
        $manager->flush();
    }
}