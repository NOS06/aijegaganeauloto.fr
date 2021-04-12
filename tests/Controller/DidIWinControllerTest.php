<?php

namespace App\Tests\Controller;

use App\DataFixtures\AppFixtures;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DidIWinControllerTest extends WebTestCase
{
    public function testDidIWinIsSuccessful(): void
    {
        $client = static::createClient();

        $client->request('GET', '/');
        self::assertResponseIsSuccessful();

        $client->submitForm('Rechercher', [
            'did_i_win[ball1]' => 1,
            'did_i_win[ball2]' => 2,
            'did_i_win[ball3]' => 3,
            'did_i_win[ball4]' => 4,
            'did_i_win[ball5]' => 5,
            'did_i_win[luckyNumber]' => 6,
        ]);
        self::assertResponseRedirects('');
    }

    public function testIWon(): void
    {
        $client = static::createClient();

        $client->request('GET', '/');
        self::assertResponseIsSuccessful();

        $client->submitForm('Rechercher', [
            'did_i_win[ball1]' => 1,
            'did_i_win[ball2]' => 2,
            'did_i_win[ball3]' => 3,
            'did_i_win[ball4]' => 4,
            'did_i_win[ball5]' => 5,
            'did_i_win[luckyNumber]' => 6,
        ]);

        self::assertResponseRedirects(sprintf('/%s/you-won', AppFixtures::WINNING_ID));
    }

    public function testINeverWon(): void
    {
        $client = static::createClient();

        $client->request('GET', '/');
        self::assertResponseIsSuccessful();

        $client->submitForm('Rechercher', [
            'did_i_win[ball1]' => 5,
            'did_i_win[ball2]' => 25,
            'did_i_win[ball3]' => 42,
            'did_i_win[ball4]' => 7,
            'did_i_win[ball5]' => 16,
            'did_i_win[luckyNumber]' => 6,
        ]);

        self::assertResponseRedirects('/you-never-won');
    }
}
