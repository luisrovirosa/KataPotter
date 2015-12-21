<?php

namespace KataPotter\Test;

use KataPotter\Basket;
use KataPotter\Book;

class KataPotterShould extends \PHPUnit_Framework_TestCase
{

    /** @test */
    public function one_book_costs_8_euros()
    {
        $basket = $this->createBasketWithBooks([1]);
        $this->assertEquals(8, $basket->price());
    }

    /** @test */
    public function two_copies_of_the_same_book_costs_16_euros()
    {
        $basket = $this->createBasketWithBooks([1, 1]);
        $this->assertEquals(16, $basket->price());
    }

    /**
     * @param $bookNumbers
     * @return Basket
     */
    private function createBasketWithBooks($bookNumbers)
    {
        $books = $this->books($bookNumbers);

        return new Basket($books);
    }

    /**
     * @param array $bookNumbers
     * @return Book[]
     */
    private function books(array $bookNumbers)
    {
        $books = [];
        foreach ($bookNumbers as $number) {
            $books[] = new Book($number);
        }

        return $books;
    }
    // Three copies of the same book costs 24 €
    // Four copies of the same book costs 32 €
    // Five copies of the same book costs 40 €
    // Two different books has a 5% of discount
    // Three different books has a 10% of discount
    // Four different books has a 20% of discount
    // Five different books has a 25% of discount
    // Three different books and one duplicated get the 20% of discount on the 3 different books
    // 2 copies of first book, 2 copies of second, 2 of the third, 1 of fourth and 1 of the fifth costs 51.2 €
}