<?php
/**
 * Created by PhpStorm.
 * User: oleksandr
 * Date: 6/13/2017
 * Time: 3:10 AM
 */

namespace OleZan\BoardingCard\Card;


class Flight implements CardInterface, StringInterface
{
    private $basicCard;

    private $flight;

    private $gate;

    private $seat;

    private $baggageDrop;

    public function __construct(
        string $source,
        string $destination,
        string $flight,
        string $gate,
        string $seat,
        string $baggageDrop = null
    )
    {
        $this->basicCard = new BasicCard($source, $destination);
        $this->flight = $flight;
        $this->gate = $gate;
        $this->seat = $seat;
        $this->baggageDrop = $baggageDrop;
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
        $baggageDrop = PHP_EOL . (
            $this->baggageDrop === null ?
                'Baggage will be automatically transferred from your last leg.' :
                \sprintf('Baggage drop at ticket counter %s.', $this->baggageDrop)
            );

        return \sprintf(
            'From %s, take flight %s to %s. Gate %s, seat %s.%s',
            $this->getSource(),
            $this->flight,
            $this->getDestination(),
            $this->gate,
            $this->seat,
            $baggageDrop
        );
    }
}