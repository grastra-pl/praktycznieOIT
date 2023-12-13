<?php

namespace App\Repository;

use App\Entity\RailwayConnection;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<RailwayConnection>
 *
 * @method RailwayConnection|null find($id, $lockMode = null, $lockVersion = null)
 * @method RailwayConnection|null findOneBy(array $criteria, array $orderBy = null)
 * @method RailwayConnection[]    findAll()
 * @method RailwayConnection[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RailwayConnectionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RailwayConnection::class);
    }


    public function findSearchResults($initial_station, $destination_station, $date_of_travel): array
    {
        $end_date = (new \DateTime($date_of_travel))->add(new \DateInterval('P1D'));

        //TODO naprawa błędu! Testerzy zgłaszają, że wyszukiwarka wyrzuca wszystkie połączenia po wskazanej dacie.
        // a my chcemy, żeby wyszukiwało wszystkie tylko w danym dniu. Podpowiedź: wykorzystaj $end_date utworzone wyżej :) 
        
        //TODO chcemy, żeby wyniki były sortowane przez datę wyjazdu.

        return $this->createQueryBuilder('r')
            ->andWhere('r.initial_station = :initial')
            ->andWhere('r.destination_station = :destination')
            ->andWhere("r.leaves_at > :date_start")
            ->setParameter('initial', $initial_station)
            ->setParameter('destination', $destination_station)
            ->setParameter('date_start', $date_of_travel)
            ->setMaxResults(15)
            ->getQuery()
            ->getResult();
    }

    public function findById($id)
    {
        //TODO do zrobienia
    }


}