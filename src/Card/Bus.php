<?php


namespace OleZan\BoardingCard\Card;

class Bus implements CardInterface, StringInterface
{
    private $basicCard;

    private $bus;

    private $seat;

    public function __construct($source, $destination, $bus, $seat = null)
    {
        $this->basicCard = new BasicCard($source, $destination);
        $this->bus = $bus;
        $this->seat = $seat;
    }

    public function getSource(): string
    {
        return $this->basicCard->getSource();
    }

    public function getDestination(): string
    {
        return $this->basicCard->getDestination();
    }

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