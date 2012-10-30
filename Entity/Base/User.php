<?php

namespace Zorbus\NewsletterBundle\Entity\Base;

use Doctrine\ORM\Mapping as ORM;

/**
 * Zorbus\NewsletterBundle\Entity\User
 */
class User
{
    public function __toString()
    {
        return $this->getName(). ' <'.$this->getEmail() .'>';
    }
}
