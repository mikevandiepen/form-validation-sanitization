<?php

namespace Mediadevs\FormAssist\Validate\Rules\String;

use Mediadevs\FormAssist\Validate\Rules\Rule;
use Mediadevs\FormAssist\Validate\ValidationInterface;

class IPv6Address extends Rule implements ValidationInterface
{
    /**
     * IpAddress constructor.
     *
     * @param array  $values
     * @param array  $parameters
     */
    public function __construct(array $values, array $parameters = array())
    {
        parent::__construct($values, $parameters);
    }

    /**
     * Validating the assigned rule and returning whether it passes or not
     * @return boolean
     */
    public function validate() : bool
    {
        return filter_var($this->values[0], FILTER_VALIDATE_IP, FILTER_FLAG_IPV6);
    }
}
