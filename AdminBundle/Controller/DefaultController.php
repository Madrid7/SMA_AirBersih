<?php

namespace SMA\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use SMA\AdminBundle\Entity\Matapelajaran;
use SMA\UserBundle\Entity\User;
use SMA\AdminBundle\Entity\Jurusan;
use SMA\AdminBundle\Entity\Berita;

class DefaultController extends Controller
{
    public function AdminHomeAction()
    {
        return $this->render('SMAAdminBundle:AdminPage:AdminHome.html.twig');
    }

    public function AdminProfilAction()
    {
        return $this->render('SMAAdminBundle:AdminPage:AdminProfil.html.twig');
    }

    public function EditProfilAction(Request $request)
    {
        $user = $this->container->get('security.context')->getToken()->getUser();
        if($request->getMethod()=='POST'){
            
            $userManager = $this->get('fos_user.user_manager');
            $nama = $request->get('nama');
            $email = $request->get('email');
            $password = $request->get('password');
                        
            $user->setNama($nama);
            $user->setEmail($email);
            $user->setPlainPassword($password);
            $userManager->updatePassword($user);
            
            $userManager->updateUser($user);
            
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirect($this->generateUrl('admin_profil'));
        }

        return $this->render('SMAAdminBundle:AdminPage:EditProfil.html.twig');
    }

    public function DataGuruAction(Request $request)
    {
        if($request->getMethod()=='POST'){
            $user = new User();
            $userManager = $this->get('fos_user.user_manager');
            $username = $request->get('username');
            $password = $request->get('password');
            $email = $request->get('email');
            $nip = $request->get('nip');
            $nama = $request->get('nama');
            $bidang = $request->get('bidang');
                        
            $user = $userManager->createUser();
            $user->setUsername($username);
            $user->setPlainPassword($password);
            $userManager->updatePassword($user);
            
            $user->setEmail($email);
            $user->setNoInduk($nip);
            $user->setNama($nama);
            $user->setBidang($bidang);
            $user->setEnabled(true);
            $user->setRoles(array('ROLE_TEACHER'));
            $user->setProfesi('Guru');
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            return $this->redirect($this->generateUrl('data_guru'));
        }

        $mapel = $this->getDoctrine()->getRepository('SMAAdminBundle:Matapelajaran')->findBy(array(), array('mataPelajaran'=>'asc'));
        $guru = $this->getDoctrine()->getRepository('SMAUserBundle:User')->findBy(array('profesi' => 'Guru'), array('nama'=>'asc'));
        return $this->render('SMAAdminBundle:AdminPage:DataGuru.html.twig', array('mapel' => $mapel, 'guru' => $guru));
    }

    public function DeleteGuruAction(Request $request, $id)
    {
        $guru = $this->getDoctrine()->getRepository('SMAUserBundle:User')->find($id);
        $em = $this->getDoctrine()->getEntityManager();
        $em->remove($guru);
        $em->flush();
           
        return $this->redirect($this->generateUrl('data_guru'));
    }

    public function DataSiswaAction(Request $request)
    {
        if($request->getMethod()=='POST'){
            $user = new User();
            $userManager = $this->get('fos_user.user_manager');
            $username = $request->get('username');
            $password = $request->get('password');
            $email = $request->get('email');
            $nip = $request->get('nip');
            $nama = $request->get('nama');
            $jurusan = $request->get('jurusan');
            $kelas = $request->get('kelas');
                        
            $user = $userManager->createUser();
            $user->setUsername($username);
            $user->setPlainPassword($password);
            $userManager->updatePassword($user);
            
            $user->setEmail($email);
            $user->setNoInduk($nip);
            $user->setNama($nama);
            $user->setJurusan($jurusan);
            $user->setKelas($kelas);
            $user->setEnabled(true);
            $user->setRoles(array('ROLE_STUDENT'));
            $user->setProfesi('Siswa');
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            return $this->redirect($this->generateUrl('data_siswa'));
        }

        $jurusan = $this->getDoctrine()->getRepository('SMAAdminBundle:Jurusan')->findAll();
        $kelas = $this->getDoctrine()->getRepository('SMAAdminBundle:Kelas')->findAll();
        $siswa = $this->getDoctrine()->getRepository('SMAUserBundle:User')->findBy(array('profesi' => 'Siswa'), array('nama'=>'asc'));
        return $this->render('SMAAdminBundle:AdminPage:DataSiswa.html.twig', array('jurusan' => $jurusan, 'siswa' => $siswa, 'kelas' => $kelas));
    }

    public function DeleteSiswaAction(Request $request, $id)
    {
        $siswa = $this->getDoctrine()->getRepository('SMAUserBundle:User')->find($id);
        $em = $this->getDoctrine()->getEntityManager();
        $em->remove($siswa);
        $em->flush();
           
        return $this->redirect($this->generateUrl('data_siswa'));
    }

    public function DataAdminAction(Request $request)
    {
        if($request->getMethod()=='POST'){
            $user = new User();
            $userManager = $this->get('fos_user.user_manager');
            $username = $request->get('username');
            $password = $request->get('password');
            $email = $request->get('email');
                                    
            $user = $userManager->createUser();
            $user->setUsername($username);
            $user->setPlainPassword($password);
            $userManager->updatePassword($user);
            $user->setEmail($email);
            $user->setEnabled(true);
            $user->setRoles(array('ROLE_ADMIN'));
            $user->setProfesi('Admin');
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            return $this->redirect($this->generateUrl('data_admin'));
        }

        $admin = $this->getDoctrine()->getRepository('SMAUserBundle:User')->findBy(array('profesi' => 'Admin'));
        return $this->render('SMAAdminBundle:AdminPage:DataAdmin.html.twig', array('admin' => $admin));
    }

    public function DeleteAdminAction(Request $request, $id)
    {
        $admin = $this->getDoctrine()->getRepository('SMAUserBundle:User')->find($id);
        $em = $this->getDoctrine()->getEntityManager();
        $em->remove($admin);
        $em->flush();
           
        return $this->redirect($this->generateUrl('data_admin'));
    }

    public function DataJurusanAction(Request $request)
    {
        if($request->getMethod()=='POST'){
            $a = new Jurusan();
            $jurusan = $request->get('jurusan');
                                    
            $a->setJurusan($jurusan);
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($a);
            $em->flush();
            return $this->redirect($this->generateUrl('data_jurusan'));
        }

        $jurusan = $this->getDoctrine()->getRepository('SMAAdminBundle:Jurusan')->findBy(array(),array('jurusan' => 'asc'));
        return $this->render('SMAAdminBundle:AdminPage:DataJurusan.html.twig', array('jurusan' => $jurusan));
    }

    public function DeleteJurusanAction(Request $request, $id)
    {
        $jurusan = $this->getDoctrine()->getRepository('SMAAdminBundle:Jurusan')->find($id);
        $em = $this->getDoctrine()->getEntityManager();
        $em->remove($jurusan);
        $em->flush();
           
        return $this->redirect($this->generateUrl('data_jurusan'));
    }

    public function DataMapelAction(Request $request)
    {
        if($request->getMethod()=='POST'){
            $a = new Matapelajaran();
            $mp = $request->get('mp');
                                    
            $a->setMataPelajaran($mp);
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($a);
            $em->flush();
            return $this->redirect($this->generateUrl('data_mapel'));
        }

        $mapel = $this->getDoctrine()->getRepository('SMAAdminBundle:Matapelajaran')->findBy(array(),array('mataPelajaran' => 'asc'));
        return $this->render('SMAAdminBundle:AdminPage:DataMapel.html.twig', array('mapel' => $mapel));
    }

    public function DeleteMapelAction(Request $request, $id)
    {
        $mapel = $this->getDoctrine()->getRepository('SMAAdminBundle:Matapelajaran')->find($id);
        $em = $this->getDoctrine()->getEntityManager();
        $em->remove($mapel);
        $em->flush();
           
        return $this->redirect($this->generateUrl('data_mapel'));
    }

    public function DataBeritaAction(Request $request)
    {
        if($request->getMethod()=='POST'){
            $a = new Berita();
            $judul = $request->get('judul');
            $konten = $request->get('konten');
            $penulis = $request->get('penulis');
                                    
            $a->setJudul($judul);
            $a->setTanggal(new \DateTime("now"));
            $a->setKonten($konten);
            $a->setPenulis($penulis);
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($a);
            $em->flush();
            return $this->redirect($this->generateUrl('data_berita'));
        }

        $berita = $this->getDoctrine()->getRepository('SMAAdminBundle:Berita')->findBy(array(),array('tanggal' => 'desc'));
        return $this->render('SMAAdminBundle:AdminPage:DataBerita.html.twig', array('berita' => $berita));
    }

    public function DeleteBeritaAction(Request $request, $id)
    {
        $berita = $this->getDoctrine()->getRepository('SMAAdminBundle:Berita')->find($id);
        $em = $this->getDoctrine()->getEntityManager();
        $em->remove($berita);
        $em->flush();
           
        return $this->redirect($this->generateUrl('data_berita'));
    }
}
