<?php

namespace mikevandiepen\utility\Sanitize\Filters;

use mysqli;
use mikevandiepen\utility\Sanitize\SanitizationInterface;

class JsonDecode extends Filter implements SanitizationInterface
{
    /**
     * SanitizationInterface constructor.
     *
     * @param             $input
     * @param null|mysqli $link
     */
    public function __construct($input, $link = null)
    {
        parent::__construct($input, $link);
    }

    /**
     * Validating the attribute
     * @return string
     */
    public function sanitize() : string
    {
        return json_decode($this->input);
    }
}
