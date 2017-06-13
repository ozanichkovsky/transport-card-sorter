<?php

namespace OleZan\BoardingCard\Card;

/**
 * Flight boarding cart
 */
class Flight implements CardInterface, StringInterface
{
    /**
     * @var BasicCard
     */
    private $basicCard;

    /**
     * @var string
     */
    private $flight;

    /**
     * @var string
     */
    private $gate;

    /**
     * @var string
     */
    private $seat;

    /**
     * @var string
     */
    private $baggageDrop;

    /**
     * Flight constructor.
     *
     * @param string $source
     * @param string $destination
     * @param string $flight
     * @param string $gate
     * @param string $seat
     * @param string|null $baggageDrop
     */
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