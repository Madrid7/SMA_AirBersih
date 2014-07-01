<?php

namespace SMA\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Kelas
 */
class Kelas
{
    /**
     * @var string
     */
    private $kelas;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set kelas
     *
     * @param string $kelas
     * @return Kelas
     */
    public function setKelas($kelas)
    {
        $this->kelas = $kelas;

        return $this;
    }

    /**
     * Get kelas
     *
     * @return string 
     */
    public function getKelas()
    {
        return $this->kelas;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}
