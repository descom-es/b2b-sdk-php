<?php

namespace Descom\B2b\Models;

abstract class Model
{
    public function __construct(array $data = [])
    {
        foreach ($data as $prop => $value) {
            if(property_exists($this, $prop)) {
                $this->{$prop} = $value;
            }
        }
    }

    public function toArray(): array
    {
        return get_object_vars($this);
    }
}
