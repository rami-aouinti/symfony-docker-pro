<?php

declare(strict_types=1);

namespace App\Repository;

use App\Data\SearchData;
use App\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;
use Knp\Component\Pager\Pagination\PaginationInterface;
use Knp\Component\Pager\PaginatorInterface;

/**
 * @method Product|null find($id, $lockMode = null, $lockVersion = null)
 * @method Product|null findOneBy(array $criteria, array $orderBy = null)
 * @method Product[]    findAll()
 * @method Product[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry, PaginatorInterface $paginator)
    {
        parent::__construct($registry, Product::class);
        $this->paginator = $paginator;
    }

    /**
     * * @return PaginationInterface Returns an array of Product objects
     */
    public function findSearch(SearchData $search) : PaginationInterface
    {
        $query = $this->getSearchQuery($search)->getQuery();
        return $this->paginator->paginate(
          $query,
          $search->page,
          15
        );
    }

    /**
     * @param SearchData $search
     * @return int[]
     */
    public function findMinMax(SearchData $search): array
    {
        $result = $this->getSearchQuery($search)
            ->select('MIN(p.price) as min, MAX(p.price) as max')
            ->getQuery()
            ->getScalarResult();
        return [(int)$result[0]['min'], (int)$result[0]['max']];
    }

    private function getSearchQuery(SearchData $search): QueryBuilder
    {
        $query = $this->createQueryBuilder('p')
            ->select('c', 'p')
            ->join('p.category', 'c');

        if(!empty($search->q)) {
            $query = $query
                ->andWhere('p.name LIKE :q')
                ->setParameter('q', "%{$search->q}%");
        }

        if(!empty($search->min)) {
            $query = $query
                ->andWhere('p.price >= :min')
                ->setParameter('min', $search->min);
        }

        if(!empty($search->max)) {
            $query = $query
                ->andWhere('p.price <= :max')
                ->setParameter('max', $search->max);
        }

        if(!empty($search->promo)) {
            $query = $query
                ->andWhere('p.promo = 1');
        }

        if(!empty($search->categories)) {
            $query = $query
                ->andWhere('c.id IN (:categories)')
                ->setParameter('categories', $search->categories);
        }

        $query = $query
            ->orderBy('p.id', 'ASC');

        return $query;
    }
}
