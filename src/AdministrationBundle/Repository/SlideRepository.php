<?php

namespace AdministrationBundle\Repository;

/**
 * SlideRepository
 */
class SlideRepository extends \Doctrine\ORM\EntityRepository
{
    public function getEnabledSlidesByLocationName($location): array
    {
        $query = $this->_em->createQuery('
            SELECT s
            FROM AdministrationBundle:Slide s
                JOIN s.tags t
                JOIN t.locations l
            WHERE l.location = :location and s.enabled = 1
        ')->setParameter('location', $location);

        return $query->getArrayResult();
    }
}
