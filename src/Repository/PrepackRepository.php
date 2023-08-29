<?php

// src/Repository/PrepackRepository.php

namespace App\Repository;

use App\Entity\Prepack;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Prepack|null find($id, $lockMode = null, $lockVersion = null)
 * @method Prepack|null findOneBy(array $criteria, array $orderBy = null)
 * @method Prepack[]    findAll()
 * @method Prepack[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */

class PrepackRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Prepack::class);
    }

    public function findAllOrderedByImportantFields($dateFilter, $trackingFilter): array
    {
        $qb = $this->createQueryBuilder('p')
            ->select('p.tracking', 'p.creationdate', 'p.npack', 'p.packtype', 'p.weight', 'p.image')
            ->orderBy('CASE WHEN p.image IS NOT NULL THEN 0 ELSE 1 END', 'ASC')
            ->addOrderBy('p.tracking', 'ASC')
            ->addOrderBy('p.creationdate', 'ASC')
            ->addOrderBy('p.npack', 'ASC')
            ->addOrderBy('p.packtype', 'ASC')
            ->addOrderBy('p.weight', 'ASC');

        if ($dateFilter) {
            $qb->andWhere('p.creationdate LIKE :dateFilter')
                ->setParameter('dateFilter', '%' . $dateFilter . '%');
        }

        if ($trackingFilter) {
            $qb->andWhere('LOWER(p.tracking) LIKE :trackingFilter')
                ->setParameter('trackingFilter', '%' . strtolower($trackingFilter) . '%');
        }

        return $qb->getQuery()->getResult();
    }
}
