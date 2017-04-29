<?php
// src/AppBundle/DataFixtures/ORM/LoadContactTypeData.phpata.php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\ContactType;

class LoadContactTypeData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $contactType = new ContactType();
        $contactType->setName('Email');
    
        $manager->persist($contactType);
        $manager->flush();
    
        $contactType = new ContactType();
        $contactType->setName('Telefone Fixo');
    
        $manager->persist($contactType);
        $manager->flush();
    
        $contactType = new ContactType();
        $contactType->setName('Telefone Celular');
    
        $manager->persist($contactType);
        $manager->flush();
    
        $contactType = new ContactType();
        $contactType->setName('Skype');
    
        $manager->persist($contactType);
        $manager->flush();
    }
}