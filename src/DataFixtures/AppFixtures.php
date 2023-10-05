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
            ['email' => 'john@example.com', 'fullName' => 'John Doe'],
            ['email' => 'alice@example.com', 'fullName' => 'Alice Smith'],
            ['email' => 'bob@example.com', 'fullName' => 'Bob Johnson'],
        ];

        foreach ($usersData as $userData) {
            $this->loadUser($manager, $userData);
        }

        $manager->flush();
    }

    private function loadUser(ObjectManager $manager, array $userData)
    {
        $user = new User();
        $user->setEmail($userData['email']);
        $user->setFullName($userData['fullName']);

        $manager->persist($user);

        $this->loadInventory($manager, $user);
    }

    private function loadInventory(ObjectManager $manager, User $user)
    {
        $inventory = new Inventory();
        $inventory->setUser($user);
        $inventory->setName($user->getFullName() . "'s Inventory");

        $manager->persist($inventory);

        $guitarsData = [
            ['modelName' => 'Stratocaster', 'description' => 'A classic Fender guitar'],
            ['modelName' => 'Les Paul', 'description' => 'A classic Gibson guitar'],
        ];

        foreach ($guitarsData as $guitarData) {
            $this->loadGuitar($manager, $inventory, $guitarData);
        }
    }

    private function loadGuitar(ObjectManager $manager, Inventory $inventory, array $guitarData)
    {
        $guitar = new Guitar();
        $guitar->setInventory($inventory);
        $guitar->setModelName($guitarData['modelName']);
        $guitar->setDescription($guitarData['description']);

        $manager->persist($guitar);
    }
}
