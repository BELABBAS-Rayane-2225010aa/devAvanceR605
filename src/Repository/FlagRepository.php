<?php

namespace App\Repository;

use App\Entity\Flag;
use App\Service\ApiFlags;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Flag>
 */
class FlagRepository extends ServiceEntityRepository
{
    private $apiFlags;

    public function __construct(ManagerRegistry $registry, ApiFlags $apiFlags)
    {
        parent::__construct($registry, Flag::class);
        $this->apiFlags = $apiFlags;
    }

    public function findAllFlags(): array
    {
        return $this->apiFlags->getFlags();
    }

    public function findFlagById($id): Flag
    {
        return $this->apiFlags->getFlagById($id);
    }

    public function createFlag($countryName, $flagURL): Flag
    {
        return $this->apiFlags->createFlag($countryName, $flagURL);
    }

    public function updateFlag($id, $countryName, $flagURL): Flag
    {
        return $this->apiFlags->updateFlag($id, $countryName, $flagURL);
    }

    public function deleteFlag($id): void
    {
        $this->apiFlags->deleteFlag($id);
    }

    //    /**
    //     * @return Flag[] Returns an array of Flag objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('f')
    //            ->andWhere('f.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('f.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Flag
    //    {
    //        return $this->createQueryBuilder('f')
    //            ->andWhere('f.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
