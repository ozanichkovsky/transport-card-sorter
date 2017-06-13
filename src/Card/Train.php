<?php


namespace OleZan\BoardingCard\Card;

class Train implements CardInterface, StringInterface
{
    private $basicCard;

    private $train;

    private $seat;

    public function __construct($source, $destination, $train, $seat)
    {
        $this->basicCard = new BasicCard($source, $destination);
        $this->train = $train;
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
            'Take train %s from %s to %s. Sit in seat %s.',
            $this->train,
            $this->getSource(),
            $this->getDestination(),
            $this->seat
        );
    }
}