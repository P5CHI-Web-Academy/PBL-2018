<?php

namespace AdministrationBundle\Repository;

use Doctrine\ORM\Query\Expr\Join;

/**
 * SlideRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class SlideRepository extends \Doctrine\ORM\EntityRepository
{
    public function getSlidesByLocationName($location): array
    {
        $query = $this->_em->createQuery('
            SELECT s
            FROM AdministrationBundle:Slide s
                JOIN s.tags t
                JOIN t.locations l
            WHERE l.location = :location
        ')->setParameter('location', $location);

        return $query->getArrayResult();
    }
}
