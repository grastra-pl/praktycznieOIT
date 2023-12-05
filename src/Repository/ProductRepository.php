<?php

namespace App\Repository;

use App\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Product>
 *
 * @method Product|null find($id, $lockMode = null, $lockVersion = null)
 * @method Product|null findOneBy(array $criteria, array $orderBy = null)
 * @method Product[]    findAll()
 * @method Product[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Product::class);
    }

    public function findById($id): array
    {
        return $this->createQueryBuilder('u') // SELECT * from product
            ->andWhere('u.id = :val') // WHERE id = :val
            ->setParameter('val', $id)
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function findAll(): array
    {
        return $this->createQueryBuilder('p')
            ->orderBy('p.id', 'ASC')
            ->getQuery()
            ->getResult();

        //SELECT * FROM product ORDER BY id ASC;

    }

    public function findByDescription($value): ?array
    {
        return $this->createQueryBuilder('s') //Odpowiednik:  SELECT * FROM product
            ->andWhere('s.description LIKE :description') // Odpowiednik:  WHERE description LIKE :description 
            ->setParameter('description', '%'.$value.'%') // TU PODSTAWIAMY wartość zmiennej $value, otoczoną %% w miejsce parametru :description ustawionego wyżej
            ->getQuery() // pobieramy wygenerowane zapytanie 
            ->getResult(); // i wykonujemy
    }
}
