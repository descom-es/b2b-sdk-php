<?php

namespace Descom\B2b\Models\Catalog;

use Descom\B2b\Models\Model;

class ProductModel extends Model
{
    public string $sku;
    public float $price;
    public string $gtin8;
    public string $name;
    public int $attribute_set_id;
    public string $type;
    public ?float $retail_price;
    public bool $visibility;
    public ?int $parent_id;
    public array $attribute_options;
    public ?int $brand_id;
}
