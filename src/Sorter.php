<?php

namespace OleZan\BoardingCard;

use OleZan\BoardingCard\Card\CardInterface;

/**
 * Boarding card sorter
 */
class Sorter
{
    /**
     * Return sorted list of boarding cards
     *
     * @param CardInterface[] $boardingCards
     * @return CardInterface[]
     */
    public function sort(array $boardingCards): array
    {
        $destinations = [];
        $connections = [];
        $result = [];

        $startPoint = null;

        foreach ($boardingCards as $boardingCard) {
            $destinations[$boardingCard->getDestination()] = true;
            $connections[$boardingCard->getSource()] = $boardingCard;
        }

        foreach ($connections as $connection) {
            /* @var CardInterface $connection */
            if (!array_key_exists($connection->getSource(), $destinations)) {
                $startPoint = $connection;
            }
        }

        $result[] = $startPoint;
        while ($startPoint !== null) {
            if (array_key_exists($startPoint->getDestination(), $connections)) {
                $startPoint = $connections[$startPoint->getDestination()];
                $result[] = $startPoint;
                continue;
            }

            $startPoint = null;
        }

        return $result;
    }
}
