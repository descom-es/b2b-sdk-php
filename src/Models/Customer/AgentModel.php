<?php

namespace Descom\B2b\Models\Customer;

use Descom\B2b\Models\Model;

class AgentModel extends Model
{
    public UserModel $user;
    public array $clients;
}
