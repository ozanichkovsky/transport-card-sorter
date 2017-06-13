<?php
/**
 * Created by PhpStorm.
 * User: oleksandr
 * Date: 6/13/2017
 * Time: 3:13 AM
 */

namespace OleZan\BoardingCard\Card;


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

    public function __construct(string $source, string $destination)
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
}