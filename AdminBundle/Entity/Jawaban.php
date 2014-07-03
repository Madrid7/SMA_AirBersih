<?php

namespace SMA\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Jawaban
 */
class Jawaban
{
    /**
     * @var \DateTime
     */
    private $tanggal;

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
    private $soal;

    /**
     * @var string
     */
    private $jawaban;

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
    private $matapelajaran;

    /**
     * @var string
     */
    private $status;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set tanggal
     *
     * @param \DateTime $tanggal
     * @return Jawaban
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
     * Set userSiswa
     *
     * @param string $userSiswa
     * @return Jawaban
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
     * @return Jawaban
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
     * @return Jawaban
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
     * Set userGuru
     *
     * @param string $userGuru
     * @return Jawaban
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
     * @return Jawaban
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
     * Set soal
     *
     * @param string $soal
     * @return Jawaban
     */
    public function setSoal($soal)
    {
        $this->soal = $soal;

        return $this;
    }

    /**
     * Get soal
     *
     * @return string 
     */
    public function getSoal()
    {
        return $this->soal;
    }

    /**
     * Set jawaban
     *
     * @param string $jawaban
     * @return Jawaban
     */
    public function setJawaban($jawaban)
    {
        $this->jawaban = $jawaban;

        return $this;
    }

    /**
     * Get jawaban
     *
     * @return string 
     */
    public function getJawaban()
    {
        return $this->jawaban;
    }

    /**
     * Set kelas
     *
     * @param string $kelas
     * @return Jawaban
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
     * @return Jawaban
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
     * Set matapelajaran
     *
     * @param string $matapelajaran
     * @return Jawaban
     */
    public function setMatapelajaran($matapelajaran)
    {
        $this->matapelajaran = $matapelajaran;

        return $this;
    }

    /**
     * Get matapelajaran
     *
     * @return string 
     */
    public function getMatapelajaran()
    {
        return $this->matapelajaran;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return Jawaban
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->status;
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
    private $judul;


    /**
     * Set judul
     *
     * @param string $judul
     * @return Jawaban
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
}
