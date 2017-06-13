<?php

namespace OleZan\BoardingCard\Card;

/**
 * Train boarding card
 */
class Train implements CardInterface, StringInterface
{
    /**
     * @var BasicCard
     */
    private $basicCard;

    /**
     * @var string
     */
    private $train;

    /**
     * @var string
     */
    private $seat;

    /**
     * Train constructor.
     *
     * @param string $source
     * @param string $destination
     * @param string $train
     * @param string $seat
     */
    public function __construct($source, $destination, $train, $seat)
    {
        $this->basicCard = new BasicCard($source, $destination);
        $this->train = $train;
        $this->seat = $seat;
    }

    /**
     * Get source
     *
     * @return string
     */
    public function getSource(): string
    {
        return $this->basicCard->getSource();
    }

    /**
     * Get destination
     *
     * @return string
     */
    public function getDestination(): string
    {
        return $this->basicCard->getDestination();
    }

    /**
     * String representation
     *
     * @return string
     */
    public function __toString(): string
    {
        return \sprintf(
            'Take train %s from %s to %s. Sit in seat %s.',
            $this->train,
            $this->getSource(),
            $this->getDestination(),
            $this->seat
        );
    }
}