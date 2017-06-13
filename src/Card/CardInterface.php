<?php

namespace OleZan\BoardingCard\Card;

interface CardInterface
{
    public function getSource(): string;

    public function getDestination(): string;
}