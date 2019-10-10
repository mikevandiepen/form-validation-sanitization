<?php

namespace mikevandiepen\utility\Validate;

use mikevandiepen\utility\Validate\String\Contains;
use mikevandiepen\utility\Validate\String\EndsWith;
use mikevandiepen\utility\Validate\String\MaxLength;
use mikevandiepen\utility\Validate\String\MinLength;
use mikevandiepen\utility\Validate\String\Regex;
use mikevandiepen\utility\Validate\String\StartsWith;

class StringValidator
{
    /**
     * All error messages will be stored in here
     * @var array
     */
    private static $errors = array();

    /**
     * Validating all the values and applying all the assigned rules
     * @param array $request
     * @return array
     */
    public static function validate(array $request = array()): array
    {
        // Parsing through all the fields
        foreach ($request as $field) {

            // Transforming the rules to an array
            $rules = explode('|', $field['rules']);

            // Iterating through the rules
            foreach ($rules as $rule) {

                // Applying the validation rule for the current iteration
                switch($rule) {
                    case 'starts_with':
                        $error = (new Validation(
                            new StartsWith($field['name'], $field['value']))
                        )->validate();
                        break;

                    case 'ends_with':
                        $error = (new Validation(
                            new EndsWith($field['name'], $field['value']))
                        )->validate();
                        break;

                    case 'contains':
                        $error = (new Validation(
                            new Contains($field['name'], $field['value']))
                        )->validate();
                        break;

                    case 'regex':
                        $error = (new Validation(
                            new Regex($field['name'], $field['value']))
                        )->validate();
                        break;

                    case 'min_length':
                        $error = (new Validation(
                            new MinLength($field['name'], $field['value']))
                        )->validate();
                        break;

                    case 'max_length':
                        $error = (new Validation(
                            new MaxLength($field['name'], $field['value']))
                        )->validate();
                        break;

                    default:
                        $error = [];
                }

                self::$errors[$field['name']]['errors'][] = $error;
            }
        }

        return self::$errors;
    }
}