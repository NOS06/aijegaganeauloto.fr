<?php

namespace App\Repository;

use App\DidIWinDto;
use App\Entity\Drawing;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Drawing|null find($id, $lockMode = null, $lockVersion = null)
 * @method Drawing|null findOneBy(array $criteria, array $orderBy = null)
 * @method Drawing[]    findAll()
 * @method Drawing[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DrawingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Drawing::class);
    }

    public function findDidIWin(DidIWinDto $dto): ?Drawing
    {
        $qb = $this->createQueryBuilder('drawing');

        return $qb
            ->where($qb->expr()->in('drawing.ball1', ':balls'))
            ->andWhere($qb->expr()->in('drawing.ball2', ':balls'))
            ->andWhere($qb->expr()->in('drawing.ball3', ':balls'))
            ->andWhere($qb->expr()->in('drawing.ball4', ':balls'))
            ->andWhere($qb->expr()->in('drawing.ball5', ':balls'))
            ->andWhere($qb->expr()->in('drawing.luckyNumber', ':luckyNumber'))
            ->setParameter(':balls', $dto->getBalls())
            ->setParameter(':luckyNumber', $dto->getLuckyNumber())
            ->getQuery()
            ->enableResultCache()
            ->getOneOrNullResult();
    }
}
