<?php

namespace OleZan\BoardingCard\Card;

interface CardInterface
{
    /**
     * Get source
     *
     * @return string
     */
    public function getSource(): string;

    /**
     * Get destination
     *
     * @return string
     */
    public function getDestination(): string;
}