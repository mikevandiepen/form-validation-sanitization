<?php

namespace Mediadevs\FormAssist\Validate\Rules\Email;

use Mediadevs\FormAssist\Validate\Rules\Rule;
use Mediadevs\FormAssist\Validate\ValidationInterface;
use Mediadevs\FormAssist\Validate\Traits\DomainTraits;

class AllowedProviders extends Rule implements ValidationInterface
{
    use DomainTraits;

    /**
     * AllowedProviders constructor.
     *
     * @param array $values
     * @param array $parameters
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
        return in_array($this->extractDomainFromEmail($this->values[0]), $this->parameters);
    }
}
