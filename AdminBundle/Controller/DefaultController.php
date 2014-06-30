<?php

namespace SMA\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

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

    public function DataGuruAction()
    {
        return $this->render('SMAAdminBundle:AdminPage:DataGuru.html.twig');
    }

    public function DataSiswaAction()
    {
        return $this->render('SMAAdminBundle:AdminPage:DataSiswa.html.twig');
    }

    public function DataAdminAction()
    {
        return $this->render('SMAAdminBundle:AdminPage:DataAdmin.html.twig');
    }

    public function DataJurusanAction()
    {
        return $this->render('SMAAdminBundle:AdminPage:DataJurusan.html.twig');
    }
}
