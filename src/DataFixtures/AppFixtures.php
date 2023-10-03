<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Inventory;
use App\Entity\Guitar;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $usersData = [
            ['email' => 'john@example.com', 'fullName' => 'John Doe', 'password' => 'password123'],
            ['email' => 'alice@example.com', 'fullName' => 'Alice Smith', 'password' => 'password456'],
            ['email' => 'bob@example.com', 'fullName' => 'Bob Johnson', 'password' => 'password789'],
        ];

        foreach ($usersData as $userData) {
            yield from $this->loadUser($manager, $userData);
        }

        $manager->flush();
    }

    private function loadUser(ObjectManager $manager, array $userData): \Generator
    {
        $user = new User();
        $user->setEmail($userData['email']);
        $user->setFullName($userData['fullName']); // Setting fullName instead of firstName and lastName
        $user->setPassword($userData['password']); // Directly setting the password without encoding

        $manager->persist($user);

        yield $user;

        yield from $this->loadInventory($manager, $user);
    }

    private function loadInventory(ObjectManager $manager, User $user): \Generator
    {
        $inventory = new Inventory();
        $inventory->setUser($user);
        // Add more properties if needed...

        $manager->persist($inventory);

        yield $inventory;

        $guitarsData = [
            ['modelName' => 'Stratocaster', 'brand' => 'Fender'],
            ['modelName' => 'Les Paul', 'brand' => 'Gibson'],
        ];

        foreach ($guitarsData as $guitarData) {
            yield from $this->loadGuitar($manager, $inventory, $guitarData);
        }
    }

    private function loadGuitar(ObjectManager $manager, Inventory $inventory, array $guitarData): \Generator
    {
        $guitar = new Guitar();
        $guitar->setInventory($inventory);
        $guitar->setModelName($guitarData['modelName']);
        $guitar->setBrand($guitarData['brand']);
        // Add more properties if needed...

        $manager->persist($guitar);

        yield $guitar;
    }
}
