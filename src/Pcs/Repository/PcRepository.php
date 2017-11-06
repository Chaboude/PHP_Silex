<?php

namespace App\Pcs\Repository;

use App\Pcs\Entity\Pc;
use Doctrine\DBAL\Connection;

/**
 * pc repository.
 */
class PcRepository
{
    /**
     * @var \Doctrine\DBAL\Connection
     */
    protected $db;

    public function __construct(Connection $db)
    {
        $this->db = $db;
    }

   /**
    * Returns a collection of pc.
    *
    * @param int $limit
    *   The number of  to return.
    * @param int $offset
    *   The number of pc to skip.
    * @param array $orderBy
    *   Optionally, the order by info, in the $column => $direction format.
    *
    * @return array A collection of pc, keyed by pc id.
    */
   public function getAll()
   {
       $queryBuilder = $this->db->createQueryBuilder();
       $queryBuilder
           ->select('p.*')
           ->from('pc', 'p');

       $statement = $queryBuilder->execute();
       $pcsData = $statement->fetchAll();
       $pcEntityList = null;

       foreach ($pcsData as $pcData) {
           $pcEntityList[$pcData['id']] = new Pc($pcData['id'], $pcData['marque'], $pcData['age'], $pcData['version'], $pcData['idproprietaire']);
       }

       return $pcEntityList;
   }

   /**
    * Returns an pc object.
    *
    * @param $id
    *   The id of the pc to return.
    *
    * @return array A collection of pc, keyed by pc id.
    */
   public function getByid($id)
   {
       $queryBuilder = $this->db->createQueryBuilder();
       $queryBuilder
           ->select('p.*')
           ->from('pc', 'p')
           ->where('id = ?')
           ->setParameter(0, $id);
       $statement = $queryBuilder->execute();
       $pcData = $statement->fetchAll();

       return new pc($pcData[0]['id'],$pcData[0]['version'], $pcData[0]['marque'], $pcData[0]['age'], $pcData[0]['idproprietaire']);
   }

   public function getByMasterId($id)
   {
       $queryBuilder = $this->db->createQueryBuilder();
       $queryBuilder
           ->select('p.marque')
           ->from('pc', 'p')
           ->where('id = ?')
           ->setParameter(0, $id);
       $statement = $queryBuilder->execute();
       $pcData = $statement->fetchAll();

       return new pc($pcData[0]['id'],$pcData[0]['version'], $pcData[0]['marque'], $pcData[0]['age'], $pcData[0]['idproprietaire']);
   }

    public function delete($id)
    {
        $queryBuilder = $this->db->createQueryBuilder();
        $queryBuilder
          ->delete('pc')
          ->where('id = :id')
          ->setParameter(':id', $id);

        $statement = $queryBuilder->execute();
    }

    public function update($parameters)
    {
        $queryBuilder = $this->db->createQueryBuilder();
        $queryBuilder
          ->update('pc')
          ->where('id = :id')
          ->setParameter(':id', $parameters['id']);

        if ($parameters['marque']) {
            $queryBuilder
              ->set('marque', ':marque')
              ->setParameter(':marque', $parameters['marque']);
        }

        if ($parameters['age']) {
            $queryBuilder
            ->set('age', ':age')
            ->setParameter(':age', $parameters['age']);
        }
        if ($parameters['version']) {
            $queryBuilder
            ->set('version', ':version')
            ->setParameter(':version', $parameters['version']);
        }
        if ($parameters['idproprietaire']) {
            $queryBuilder
            ->set('idproprietaire', ':idproprietaire')
            ->setParameter(':idproprietaire', $parameters['idproprietaire']);
        }

        $statement = $queryBuilder->execute();
    }

    public function insert($parameters)
    {
        $queryBuilder = $this->db->createQueryBuilder();
        $queryBuilder
          ->insert('pc')
          ->values(
              array(
                'id' => ':id',
                'marque' => ':marque',
                'age' => ':age',
                'version' => ':version',
                'idproprietaire' => ':idproprietaire'
              )
          )
          ->setParameter(':id', $parameters['id'])
          ->setParameter(':marque', $parameters['marque'])
          ->setParameter(':age', $parameters['age'])
          ->setParameter(':version', $parameters['version'])
          ->setParameter(':idproprietaire', $parameters['idproprietaire']);

        $statement = $queryBuilder->execute();
    }
}
