<?php

namespace OleZan\BoardingCard\Tests;

use OleZan\BoardingCard\Card\Bus;
use OleZan\BoardingCard\Card\Flight;
use OleZan\BoardingCard\Card\Train;
use OleZan\BoardingCard\Sorter;
use PHPUnit\Framework\TestCase;

class FunctionalTest extends TestCase
{
    /**
     * @var Sorter
     */
    private $sorter;

    public function setUp()
    {
        $this->sorter = new Sorter();
    }

    /**
     * @dataProvider dataProvider
     *
     * @param $input
     * @param $expected
     */
    public function testSort($input, $expected)
    {
        $sorted = $this->sorter->sort($input);

        $stringLines = [];

        foreach ($sorted as $item) {
            $stringLines[] = $item->__toString();
        }

        $this->assertEquals($expected, $stringLines);
    }

    public function dataProvider()
    {
        $ticket1 = new Train('Madrid', 'Barcelona', '78A', '45B');
        $ticket2 = new Bus('Barcelona', 'Gerona Airport', 'the airport bus');
        $ticket3 = new Flight(
            'Gerona Airport',
            'Stockholm',
            'SK455',
            '45B',
            '3A',
            '344'
        );
        $ticket4 = new Flight(
            'Stockholm',
            'New York JFK',
            'SK22',
            '22',
            '7B'
        );

        $input = [
            $ticket1,
            $ticket2,
            $ticket3,
            $ticket4,
        ];

        $expectedResult = [
            'Take train 78A from Madrid to Barcelona. Sit in seat 45B.',
            'Take the airport bus from Barcelona to Gerona Airport. No seat assignment.',
            'From Gerona Airport, take flight SK455 to Stockholm. Gate 45B, seat 3A.' . PHP_EOL .
                'Baggage drop at ticket counter 344.',
            'From Stockholm, take flight SK22 to New York JFK. Gate 22, seat 7B.' . PHP_EOL .
                'Baggage will be automatically transferred from your last leg.',
        ];

        yield 'Sorted' => [
            $input,
            $expectedResult
        ];

        yield 'Reversed' => [
            array_reverse($input),
            $expectedResult,
        ];

        $random = $input;
        shuffle($input);
        yield 'Random' => [
            $random,
            $expectedResult,
        ];
    }
}