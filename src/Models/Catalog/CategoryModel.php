<?php

namespace Descom\B2b\Models\Catalog;

use Descom\B2b\Models\Model;

class CategoryModel extends Model
{
    public string $name;
    public ?int $parent_id;
}
