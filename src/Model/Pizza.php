<?php

namespace Minfr\PApp\Model;

abstract class Pizza {
    protected string $name;
    protected int $size;
    protected float $basePrice;

    public function __construct(string $name, int $size, float $basePrice) {
        $this->name = $name;
        $this->size = $size;
        $this->basePrice = $basePrice;
    }

    abstract public function calculatePrice(): float;

    public function getDescription(): string {
        return "{$this->name}, {$this->size} см";
    }
}

