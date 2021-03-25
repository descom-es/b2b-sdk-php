<?php

namespace Descom\B2b\Models;

class ClientModel extends Model
{
    public string $name;
    public ?string $email;
    public ?int $group_id;
}
