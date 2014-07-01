<?php

namespace SMA\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use SMA\AdminBundle\Entity\Tugas;

class DefaultController extends Controller
{
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
