<?php

namespace OleZan\BoardingCard\Tests;

use OleZan\BoardingCard\Card\CardInterface;
use OleZan\BoardingCard\Sorter;
use PHPUnit\Framework\TestCase;

/**
 * Sorter test
 */
class SorterTest extends TestCase
{
    private $sorter;

    /**
     * Set up test
     */
    public function setUp()
    {
        $this->sorter = new Sorter();
    }

    /**
     * @dataProvider cardProvider
     *
     * @param $input
     * @param $expected
     */
    public function testSort($input, $expected)
    {
        $this->assertEquals($expected, $this->sorter->sort($input));
    }

    /**
     * Provides input for Sorter class and expected results
     *
     * @return \Generator
     */
    public function cardProvider()
    {
        $ticket1 = $this->getCard('A', 'B');
        $ticket2 = $this->getCard('B', 'C');
        $ticket3 = $this->getCard('C', 'D');
        $ticket4 = $this->getCard('D', 'E');

        $expectedResult = [
            $ticket1,
            $ticket2,
            $ticket3,
            $ticket4,
        ];

        yield 'Sorted' => [
            $expectedResult,
            $expectedResult
        ];

        yield 'Reversed' => [
            array_reverse($expectedResult),
            $expectedResult,
        ];

        $random = $expectedResult;
        shuffle($random);
        yield 'Random' => [
            $random,
            $expectedResult,
        ];
    }

    /**
     * Creates anonymous class instance that implements CardInterface for testing
     * purposes.
     *
     * @param string $source
     * @param string $destination
     * @return CardInterface
     */
    private function getCard(string $source, string $destination) {
        return new class ($source, $destination) implements CardInterface
        {
            private $source;

            private $destination;

            public function __construct($source, $destination)
            {
                $this->source = $source;
                $this->destination = $destination;
            }

            public function getSource(): string
            {
                return $this->source;
            }

            public function getDestination(): string
            {
                return $this->destination;
            }
        };
    }
}