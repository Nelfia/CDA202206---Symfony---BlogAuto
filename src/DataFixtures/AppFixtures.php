<?php

namespace App\DataFixtures;


use Faker\Factory;
use Faker\Generator;
use App\Entity\Annonce;
use App\Entity\Marque;
use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Validator\Constraints\Cascade;

class AppFixtures extends Fixture
{
    /**
     * @var Generator
     */
    private Generator $faker;

    public function __construct()
    {
        $this->faker = Factory::create('fr_FR');
    }

    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setUsername('adminFixtures');
        $user->setPassword(password_hash('123123abc', PASSWORD_DEFAULT));
        $manager->persist($user);

        $marquesNames = ['RENAULT', 'TESLA', 'CITROEN', 'BMW', 'PEUGEOT', 'INFINITY', 'KIA', 'DACIA', 'LAND ROVER'];
        $marques = [];
        foreach($marquesNames as $marque){
            $newMarque = new Marque();
            $newMarque->setName($marque);
            $marques[] = $newMarque;
            $manager->persist($newMarque);
        }

        for ($i=1; $i <= 10; $i++) { 
            $annonce = new Annonce();
            $annonce->setTitle($this->faker->sentence(4))
                ->setDescription($this->faker->paragraph)
                ->setModel($this->faker->words(1, true))
                ->setPrice($this->faker->numberBetween(2000,120000))
                ->setYear($this->faker->numberBetween(1980, 2022))
                ->setKm($this->faker->randomNumber(6, false))
                ->setFuel($this->faker->randomElement(['Essence', 'Diesel', 'Ethanol', 'Electrique']))
                ->setLicense($this->faker->numberBetween(0,1))
                ->setImgfile($this->faker->imageUrl(170,170, 'cars', true))
                ->setIsVisible(1)
                ->setMarque($marques[$this->faker->numberBetween(0,8)])
                ->setAuthor($user);
            $manager->persist($annonce);
        }
        $manager->flush();
    }
}
