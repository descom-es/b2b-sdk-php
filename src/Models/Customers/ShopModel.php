<?php

namespace Descom\B2b\Models\Customers;

use Descom\B2b\Models\Model;

class ShopModel extends Model
{
    public string $name;
    public ?string $phone;
    public ?string $address;
    public ?string $cp;
    public ?string $city;
    public ?string $state;
    public ?string $country;
}
