<?php

namespace Descom\B2b\Models\Customers;

use Descom\B2b\Models\Model;

class ClientModel extends Model
{
    public string $name;
    public ?string $email;
    public ?int $group_id;
}
