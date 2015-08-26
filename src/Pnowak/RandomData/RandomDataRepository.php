<?php
/**
 * Created by PhpStorm.
 * User: pawelnowak
 * Date: 26/08/15
 * Time: 09:56
 */

namespace Pnowak\RandomData;


use Doctrine\ORM\EntityManager;
use Pnowak\Model\TestEntity;

class RandomDataRepository
{
    private $data;

    /**
     * RandomDataRepository constructor.
     */
    public function __construct()
    {
        $this->data = json_decode(file_get_contents(__DIR__ . '/random-data.json'), true);
    }

    public function generateEntities(EntityManager $entityManager, $num = 1000)
    {
        for ($i = 0; $i < $num; $i++) {
            $id = $this->getRandomData();

            $entity = new TestEntity();
            $this->updateObjectData($entity, $id);
            $entityManager->persist($entity);
        }
    }

    public function updateEntities($rows)
    {
        foreach($rows as $row) {
            $this->updateObjectData($row, $this->getRandomData());
        }
    }

    private function updateObjectData(TestEntity $entity, $id)
    {
        $entity->setName($this->data[$id]['name']);
        $entity->setDescription($this->data[$id]['about']);
        $entity->setIndex($this->data[$id]['index']);
        $entity->setRegistered(new \DateTime($this->data[$id]['registered']));
        $entity->setGuid($this->data[$id]['guid']);
        $entity->setBalance($this->data[$id]['balance']);
    }
    
    /**
     * @return int
     */
    private function getRandomData()
    {
        $max = count($this->data)-1;
        return rand(0, $max);
    }
}