<?php

namespace SMA\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function TeacherHomeAction()
    {
        return $this->render('SMAUserBundle:TeacherPage:TeacherHome.html.twig');
    }

    public function StudentHomeAction()
    {
        return $this->render('SMAUserBundle:StudentPage:StudentHome.html.twig');
    }

    public function WaitPageAction()
    {
        return $this->render('SMAUserBundle:Default:WaitPage.html.twig');
    }
}
