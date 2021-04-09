<?php

namespace Descom\B2b\Models\Catalog;

use Descom\B2b\Models\Model;
/**
 * Undocumented class
 * @property string $name (string, required) the form field name
 * @property mixed $contents (StreamInterface/resource/string, required) The data to use in the form element
 * @property ?array $headers (array) Optional associative array of custom headers to use with the form element
 * @property ?string $filename (string) Optional string to send as the filename in the part
 */
class MediaModel extends Model
{
    public string $name; // 
    public $contents; // .
    public ?array $headers; // .
    public ?string $filename; // .
}
