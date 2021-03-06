<?php

namespace SMA\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Nilai
 */
class Nilai
{
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
    private $mataPelajaran;

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
    private $userSiswa;

    /**
     * @var string
     */
    private $nis;

    /**
     * @var string
     */
    private $namaSiswa;

    /**
     * @var integer
     */
    private $nilai;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set userGuru
     *
     * @param string $userGuru
     * @return Nilai
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
     * @return Nilai
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
     * Set mataPelajaran
     *
     * @param string $mataPelajaran
     * @return Nilai
     */
    public function setMataPelajaran($mataPelajaran)
    {
        $this->mataPelajaran = $mataPelajaran;

        return $this;
    }

    /**
     * Get mataPelajaran
     *
     * @return string 
     */
    public function getMataPelajaran()
    {
        return $this->mataPelajaran;
    }

    /**
     * Set kelas
     *
     * @param string $kelas
     * @return Nilai
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
     * @return Nilai
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
     * Set userSiswa
     *
     * @param string $userSiswa
     * @return Nilai
     */
    public function setUserSiswa($userSiswa)
    {
        $this->userSiswa = $userSiswa;

        return $this;
    }

    /**
     * Get userSiswa
     *
     * @return string 
     */
    public function getUserSiswa()
    {
        return $this->userSiswa;
    }

    /**
     * Set nis
     *
     * @param string $nis
     * @return Nilai
     */
    public function setNis($nis)
    {
        $this->nis = $nis;

        return $this;
    }

    /**
     * Get nis
     *
     * @return string 
     */
    public function getNis()
    {
        return $this->nis;
    }

    /**
     * Set namaSiswa
     *
     * @param string $namaSiswa
     * @return Nilai
     */
    public function setNamaSiswa($namaSiswa)
    {
        $this->namaSiswa = $namaSiswa;

        return $this;
    }

    /**
     * Get namaSiswa
     *
     * @return string 
     */
    public function getNamaSiswa()
    {
        return $this->namaSiswa;
    }

    /**
     * Set nilai
     *
     * @param integer $nilai
     * @return Nilai
     */
    public function setNilai($nilai)
    {
        $this->nilai = $nilai;

        return $this;
    }

    /**
     * Get nilai
     *
     * @return integer 
     */
    public function getNilai()
    {
        return $this->nilai;
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
    /**
     * @var string
     */
    private $judulTugas;


    /**
     * Set judulTugas
     *
     * @param string $judulTugas
     * @return Nilai
     */
    public function setJudulTugas($judulTugas)
    {
        $this->judulTugas = $judulTugas;

        return $this;
    }

    /**
     * Get judulTugas
     *
     * @return string 
     */
    public function getJudulTugas()
    {
        return $this->judulTugas;
    }
}
