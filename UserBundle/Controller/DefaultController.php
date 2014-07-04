<?php

namespace SMA\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use SMA\AdminBundle\Entity\Tugas;
use SMA\UserBundle\Entity\User;
use SMA\AdminBundle\Entity\Jawaban;
use SMA\AdminBundle\Entity\Nilai;
use SMA\AdminBundle\Entity\Berita;

class DefaultController extends Controller
{
    public function indexSekolahAction()
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery('SELECT p FROM SMAAdminBundle:Berita p ORDER BY p.id DESC')
                ->setMaxResults(3);
        $berita = $query->getResult();
        return $this->render('SMAUserBundle:Default:index.html.twig', array('berita' => $berita));
    }

    public function BeritaAction($id)
    {
        $berita = $this->getDoctrine()->getRepository('SMAAdminBundle:Berita')->find($id);
        return $this->render('SMAUserBundle:Default:Berita.html.twig', array('berita' => $berita));
    }

    public function ProfilSekolahAction()
    {
        return $this->render('SMAUserBundle:Default:ProfilSekolah.html.twig');
    }

    public function SejarahSekolahAction()
    {
        return $this->render('SMAUserBundle:Default:SejarahSekolah.html.twig');
    }

    public function VisiMisiAction()
    {
        return $this->render('SMAUserBundle:Default:VisiMisi.html.twig');
    }

    public function TeacherHomeAction()
    {
        return $this->render('SMAUserBundle:TeacherPage:TeacherHome.html.twig');
    }

    public function BuatTugasAction(Request $request)
    {
        $user = $this->container->get('security.context')->getToken()->getUser()->getUsername();
        if($request->getMethod()=='POST'){
            $a = new Tugas();
            $judul = $request->get('judul');
            $kelas = $request->get('kelas');
            $jurusan = $request->get('jurusan');
            $isi = $request->get('isi');
            $userguru = $request->get('userguru');
            $namaguru = $request->get('namaguru');
            $bidang = $request->get('bidang');
                                    
            $a->setUserGuru($userguru);
            $a->setNamaGuru($namaguru);
            $a->setTanggal(new \DateTime("now"));
            $a->setKelas($kelas);
            $a->setJurusan($jurusan);
            $a->setJudul($judul);
            $a->setIsi($isi);
            $a->setMataPel($bidang);
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($a);
            $em->flush();
            return $this->redirect($this->generateUrl('buat_tugas'));
        }
            
        $jurusan = $this->getDoctrine()->getRepository('SMAAdminBundle:Jurusan')->findby(array(),array('jurusan' => 'desc'));
        $kelas = $this->getDoctrine()->getRepository('SMAAdminBundle:Kelas')->findAll();
        $tugas = $this->getDoctrine()->getRepository('SMAAdminBundle:Tugas')->findBy(array('userGuru' => $user),array('id'=>'desc' ));
        return $this->render('SMAUserBundle:TeacherPage:BuatTugas.html.twig', array('kelas' => $kelas, 'jurusan' => $jurusan, 'tugas' => $tugas));
    }

    public function DeleteTugasAction(Request $request, $id)
    {
        $tugas = $this->getDoctrine()->getRepository('SMAAdminBundle:Tugas')->find($id);
        $em = $this->getDoctrine()->getEntityManager();
        $em->remove($tugas);
        $em->flush();
           
        return $this->redirect($this->generateUrl('buat_tugas'));
    }

    public function ListJawabanAction()
    {
        $user = $this->container->get('security.context')->getToken()->getUser()->getUsername();
        $jawaban = $this->getDoctrine()->getRepository('SMAAdminBundle:Jawaban')->findBy(array('userGuru' => $user, 'status' => 'uncheck'),array('tanggal' => 'asc'));
        return $this->render('SMAUserBundle:TeacherPage:ListJawaban.html.twig', array('jawaban' => $jawaban));
    }

    public function DaftarNilaiAction()
    {
        $user = $this->getUser()->getUsername();
        $nilai = $this->getDoctrine()->getRepository('SMAAdminBundle:Nilai')->findBy(array('userGuru' => $user),array('namaSiswa' => 'asc'));
        return $this->render('SMAUserBundle:TeacherPage:DaftarNilai.html.twig', array('nilai' => $nilai)); 
    }

    public function OpenJawabanAction(Request $request, $id)
    {
        $jawaban = $this->getDoctrine()->getRepository('SMAAdminBundle:Jawaban')->find($id);
        if($request->getMethod()=='POST'){
            
            $b = new Nilai();
            $nilai = $request->get('nilai');
            $userguru = $request->get('userguru');
            $namaguru = $request->get('namaguru');
            $mp = $request->get('mp');
            $judul = $request->get('judul');
            $kelas = $request->get('kelas');
            $jurusan = $request->get('jurusan');
            $usersiswa = $request->get('usersiswa');
            $namasiswa = $request->get('namasiswa');
            $nis = $request->get('nis');
            $status = $request->get('status');
                                    
            $jawaban->setStatus($status);
            $b->setUserGuru($userguru);
            $b->setNamaGuru($namaguru);
            $b->setMataPelajaran($mp);
            $b->setJudulTugas($judul);
            $b->setKelas($kelas);
            $b->setJurusan($jurusan);
            $b->setUserSiswa($usersiswa);
            $b->setNamaSiswa($namasiswa);
            $b->setNis($nis);
            $b->setNilai($nilai);
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($b);
            $em->flush();
            return $this->redirect($this->generateUrl('list_jawaban'));
        }
        return $this->render('SMAUserBundle:TeacherPage:OpenJawaban.html.twig', array('jawaban' => $jawaban));
    }

    public function DeleteJawabanAction(Request $request, $id)
    {
        $jawaban = $this->getDoctrine()->getRepository('SMAAdminBundle:Jawaban')->find($id);
        $em = $this->getDoctrine()->getEntityManager();
        $em->remove($jawaban);
        $em->flush();
           
        return $this->redirect($this->generateUrl('list_jawaban'));
    }

    public function TeacherProfileAction()
    {
        return $this->render('SMAUserBundle:TeacherPage:TeacherProfile.html.twig');
    }

    public function TEditProfileAction(Request $request)
    {
        $user = $this->container->get('security.context')->getToken()->getUser();
        if($request->getMethod()=='POST'){
            
            $userManager = $this->get('fos_user.user_manager');
            $nama = $request->get('nama');
            $email = $request->get('email');
            $password = $request->get('password');
            $noinduk = $request->get('noinduk');
            $hp = $request->get('hp');
            $alamat = $request->get('alamat');
                        
            $user->setNama($nama);
            $user->setEmail($email);
            $user->setNoInduk($noinduk);
            $user->setNoHp($hp);
            $user->setAlamat($alamat);
            $user->setPlainPassword($password);
            $userManager->updatePassword($user);
            
            $userManager->updateUser($user);
            
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirect($this->generateUrl('teacher_profile'));
        }
        return $this->render('SMAUserBundle:TeacherPage:TEditProfile.html.twig');
    }

    public function StudentHomeAction()
    {
        return $this->render('SMAUserBundle:StudentPage:StudentHome.html.twig');
    }

    public function ListTugasAction()
    {
        $kelasku = $this->getUser()->getKelas();
        $jurusanku = $this->getUser()->getJurusan();

        $tugas = $this->getDoctrine()->getRepository('SMAAdminBundle:Tugas')->findBy(array('kelas' => $kelasku, 'jurusan' => $jurusanku), array('tanggal' => 'asc'));
        return $this->render('SMAUserBundle:StudentPage:ListTugas.html.twig', array('tugas' => $tugas));
    }

    public function ListNilaiAction()
    {
        $user = $this->getUser()->getUsername();
        
        $nilai = $this->getDoctrine()->getRepository('SMAAdminBundle:Nilai')->findBy(array('userSiswa' => $user), array('mataPelajaran' => 'asc'));
        return $this->render('SMAUserBundle:StudentPage:ListNilai.html.twig', array('nilai' => $nilai));
    }

    public function OpenTugasAction(Request $request, $id)
    {
        if($request->getMethod()=='POST'){
            $jb = new Jawaban();
            $usersiswa = $request->get('username');
            $namasiswa = $request->get('nama');
            $nis = $request->get('nis');
            $userguru = $request->get('userguru');
            $namaguru = $request->get('namaguru');
            $judul = $request->get('judul');
            $soal = $request->get('soal');
            $jawaban = $request->get('jawaban');
            $kelas = $request->get('kelas');
            $jurusan = $request->get('jurusan');
            $mp = $request->get('mp');
            $status = $request->get('status');
                                    
            $jb->setTanggal(new \DateTime("now"));
            $jb->setUserSiswa($usersiswa);
            $jb->setNis($nis);
            $jb->setNamaSiswa($namasiswa);
            $jb->setUserGuru($userguru);
            $jb->setNamaGuru($namaguru);
            $jb->setJudul($judul);
            $jb->setSoal($soal);
            $jb->setJawaban($jawaban);
            $jb->setKelas($kelas);
            $jb->setJurusan($jurusan);
            $jb->setMatapelajaran($mp);
            $jb->setStatus($status);

            
            $em = $this->getDoctrine()->getManager();
            $em->persist($jb);
            $em->flush();
            return $this->redirect($this->generateUrl('list_tugas'));
        }
        $tugas = $this->getDoctrine()->getRepository('SMAAdminBundle:Tugas')->find($id);
        return $this->render('SMAUserBundle:StudentPage:OpenTugas.html.twig', array('tugas' => $tugas));
    }

    public function StudentProfileAction()
    {
        return $this->render('SMAUserBundle:StudentPage:StudentProfile.html.twig');
    }

    public function SEditProfileAction(Request $request)
    {
        $user = $this->container->get('security.context')->getToken()->getUser();
        if($request->getMethod()=='POST'){
            
            $userManager = $this->get('fos_user.user_manager');
            $nama = $request->get('nama');
            $email = $request->get('email');
            $password = $request->get('password');
            $noinduk = $request->get('noinduk');
            $hp = $request->get('hp');
            $alamat = $request->get('alamat');
            $kelas = $request->get('kelas');
            $jurusan = $request->get('jurusan');
                        
            $user->setNama($nama);
            $user->setEmail($email);
            $user->setNoInduk($noinduk);
            $user->setNoHp($hp);
            $user->setAlamat($alamat);
            $user->setKelas($kelas);
            $user->setJurusan($jurusan);
            $user->setPlainPassword($password);
            $userManager->updatePassword($user);
            
            $userManager->updateUser($user);
            
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirect($this->generateUrl('student_profile'));
        }

        $jurusan = $this->getDoctrine()->getRepository('SMAAdminBundle:Jurusan')->findAll();
        $kelas = $this->getDoctrine()->getRepository('SMAAdminBundle:Kelas')->findAll();
        return $this->render('SMAUserBundle:StudentPage:SEditProfile.html.twig', array('jurusan' => $jurusan, 'kelas' => $kelas));
    }

    public function WaitPageAction()
    {
        return $this->render('SMAUserBundle:Default:WaitPage.html.twig');
    }
}
