<?php

namespace Descom\B2b\Models\Customer;

use Descom\B2b\Models\Model;

class UserModel extends Model
{
    public string $name;
    public string $username;
    public string $password;
    public ?string $role;
}
