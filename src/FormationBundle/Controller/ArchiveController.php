<?php

namespace FormationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ArchiveController extends Controller
{
    public function indexAction()
    {
        return $this->render('FormationBundle:archive:archive.html.twig');
    }
}
