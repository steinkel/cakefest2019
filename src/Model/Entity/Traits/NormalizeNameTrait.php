<?php

namespace App\Model\Entity\Traits;

/**
 * Normalize first and last name
 *
 * @package App\Model\Entity\Traits
 */
trait NormalizeNameTrait
{
    /**
     * @param string $name
     * @return string
     */
    protected function _setFirstName(string $name): string
    {
        return mb_convert_case($name, MB_CASE_TITLE);
    }

    /**
     * @param string $name
     * @return string
     */
    protected function _setLastName(string $name): string
    {
        return mb_convert_case($name, MB_CASE_TITLE);
    }
}
