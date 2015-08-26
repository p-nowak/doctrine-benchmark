<?php
/**
 * Created by PhpStorm.
 * User: pawelnowak
 * Date: 26/08/15
 * Time: 09:37
 */

namespace Pnowak\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class TestEntity
 * @package Pnowak\Model
 *
 * @ORM\Entity()
 */
class TestEntity
{
    /**
     * @var
     *
     * @ORM\Id()
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var
     *
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @var
     *
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @var
     *
     * @ORM\Column(type="integer", name="no")
     */
    private $index;

    /**
     * @var
     *
     * @ORM\Column(type="datetime")
     */
    private $registered;

    /**
     * @var
     *
     * @ORM\Column(type="string")
     */
    private $guid;

    /**
     * @var
     *
     * @ORM\Column(type="decimal")
     */
    private $balance;


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getIndex()
    {
        return $this->index;
    }

    /**
     * @param mixed $index
     */
    public function setIndex($index)
    {
        $this->index = $index;
    }

    /**
     * @return mixed
     */
    public function getRegistered()
    {
        return $this->registered;
    }

    /**
     * @param mixed $registered
     */
    public function setRegistered($registered)
    {
        $this->registered = $registered;
    }

    /**
     * @return mixed
     */
    public function getGuid()
    {
        return $this->guid;
    }

    /**
     * @param mixed $guid
     */
    public function setGuid($guid)
    {
        $this->guid = $guid;
    }

    /**
     * @return mixed
     */
    public function getBalance()
    {
        return $this->balance;
    }

    /**
     * @param mixed $balance
     */
    public function setBalance($balance)
    {
        $this->balance = $balance;
    }



}