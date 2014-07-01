<?php

namespace SMA\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tugas
 */
class Tugas
{
    /**
     * @var \DateTime
     */
    private $tanggal;

    /**
     * @var string
     */
    private $userGuru;

    /**
     * @var string
     */
    private $namaGuru;

    /**
     * @var string
     */
    private $kelas;

    /**
     * @var string
     */
    private $jurusan;

    /**
     * @var string
     */
    private $judul;

    /**
     * @var string
     */
    private $isi;

    /**
     * @var string
     */
    private $mataPel;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set tanggal
     *
     * @param \DateTime $tanggal
     * @return Tugas
     */
    public function setTanggal($tanggal)
    {
        $this->tanggal = $tanggal;

        return $this;
    }

    /**
     * Get tanggal
     *
     * @return \DateTime 
     */
    public function getTanggal()
    {
        return $this->tanggal;
    }

    /**
     * Set userGuru
     *
     * @param string $userGuru
     * @return Tugas
     */
    public function setUserGuru($userGuru)
    {
        $this->userGuru = $userGuru;

        return $this;
    }

    /**
     * Get userGuru
     *
     * @return string 
     */
    public function getUserGuru()
    {
        return $this->userGuru;
    }

    /**
     * Set namaGuru
     *
     * @param string $namaGuru
     * @return Tugas
     */
    public function setNamaGuru($namaGuru)
    {
        $this->namaGuru = $namaGuru;

        return $this;
    }

    /**
     * Get namaGuru
     *
     * @return string 
     */
    public function getNamaGuru()
    {
        return $this->namaGuru;
    }

    /**
     * Set kelas
     *
     * @param string $kelas
     * @return Tugas
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
     * Set jurusan
     *
     * @param string $jurusan
     * @return Tugas
     */
    public function setJurusan($jurusan)
    {
        $this->jurusan = $jurusan;

        return $this;
    }

    /**
     * Get jurusan
     *
     * @return string 
     */
    public function getJurusan()
    {
        return $this->jurusan;
    }

    /**
     * Set judul
     *
     * @param string $judul
     * @return Tugas
     */
    public function setJudul($judul)
    {
        $this->judul = $judul;

        return $this;
    }

    /**
     * Get judul
     *
     * @return string 
     */
    public function getJudul()
    {
        return $this->judul;
    }

    /**
     * Set isi
     *
     * @param string $isi
     * @return Tugas
     */
    public function setIsi($isi)
    {
        $this->isi = $isi;

        return $this;
    }

    /**
     * Get isi
     *
     * @return string 
     */
    public function getIsi()
    {
        return $this->isi;
    }

    /**
     * Set mataPel
     *
     * @param string $mataPel
     * @return Tugas
     */
    public function setMataPel($mataPel)
    {
        $this->mataPel = $mataPel;

        return $this;
    }

    /**
     * Get mataPel
     *
     * @return string 
     */
    public function getMataPel()
    {
        return $this->mataPel;
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
