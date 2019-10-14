<?php

namespace mikevandiepen\utility\Sanitize\Filters;

use mikevandiepen\utility\Sanitize\SanitizationInterface;

class SanitizeUrl implements SanitizationInterface
{
    /**
     * The input for sanitization
     * @var string
     */
    protected $input;

    /**
     * The link for the mysqli connection
     * @var
     */
    private $link;

    /**
     * SanitizationInterface constructor.
     *
     * @param      $input
     * @param null $link
     */
    public function __construct($input, ?$link = null)
    {
        $this->input = $input;
        $this->link = $link;
    }

    /**
     * Validating the attribute
     * @return string
     */
    public function sanitize() : string
    {
        return filter_var($this->input, FILTER_SANITIZE_URL);
    }
}