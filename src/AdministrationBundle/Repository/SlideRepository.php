<?php

namespace AdministrationBundle\Repository;

use Doctrine\ORM\Query\Expr\Join;

class SlideRepository extends \Doctrine\ORM\EntityRepository
{
    public function getSlidesByLocationName(array $tags): array
    {
        $qb = $this->createQueryBuilder('s');

//        $qb->select('s')
//            ->from('AdministrationBundle:Slide', 's')
//            ->innerJoin('s.tags', 't', Join::ON, 's.');

        $qb->select(array('s'))
            ->from('AdministrationBundle:Slide', 's')
            ->where();

        return $qb->getQuery()->getResult();

    }
}
