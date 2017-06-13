<?php
/**
 * Created by PhpStorm.
 * User: oleksandr
 * Date: 6/13/2017
 * Time: 3:13 AM
 */

namespace OleZan\BoardingCard\Card;

/**
 * Basic card implementation
 */
class BasicCard implements CardInterface
{
    /**
     * @var string
     */
    private $source;

    /**
     * @var string
     */
    private $destination;

    /**
     * BasicCard constructor.
     *
     * @param string $source
     * @param string $destination
     */
    public function __construct(string $source, string $destination)
    {
        $this->source = $source;
        $this->destination = $destination;
    }

    /**
     * Get source
     *
     * @return string
     */
    public function getSource(): string
    {
        return $this->source;
    }

    /**
     * Get destination
     *
     * @return string
     */
    public function getDestination(): string
    {
        return $this->destination;
    }
}