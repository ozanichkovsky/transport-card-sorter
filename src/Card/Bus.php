<?php

namespace OleZan\BoardingCard\Card;

/**
 * Bus boarding card
 */
class Bus implements CardInterface, StringInterface
{
    /**
     * @var BasicCard
     */
    private $basicCard;

    /**
     * @var string
     */
    private $bus;

    /**
     * @var string
     */
    private $seat;

    /**
     * Bus card constructor.
     *
     * @param string $source
     * @param string $destination
     * @param string $bus
     * @param string|null $seat
     */
    public function __construct($source, $destination, $bus, $seat = null)
    {
        $this->basicCard = new BasicCard($source, $destination);
        $this->bus = $bus;
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
            'Take %s from %s to %s. %s.',
            $this->bus,
            $this->getSource(),
            $this->getDestination(),
            $this->seat === null ? 'No seat assignment' : \sprintf('Seat %s.', $this->seat)
        );
    }
}