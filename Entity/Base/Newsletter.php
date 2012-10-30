<?php

namespace Zorbus\NewsletterBundle\Entity\Base;

use Doctrine\ORM\Mapping as ORM;

/**
 * Zorbus\NewsletterBundle\Entity\Base\Newsletter
 */
class Newsletter
{
    public function __toString()
    {
        return $this->getTitle();
    }
}
