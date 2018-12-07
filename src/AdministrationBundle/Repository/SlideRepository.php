<?php

namespace AdministrationBundle\Repository;

class SlideRepository extends \Doctrine\ORM\EntityRepository
{
    public function getSlidesByTags(array $tags)
    {
        $qb = $this->createQueryBuilder('s');

        $qb->where(...);

        return $qb->getQuery()->getResult();
    }
}
