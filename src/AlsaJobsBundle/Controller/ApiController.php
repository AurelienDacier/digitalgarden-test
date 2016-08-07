<?php

namespace AlsaJobsBundle\Controller;


use AlsaJobsBundle\Entity\JobAdvert;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\View\View;

class ApiController extends FOSRestController
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getAdvertsAction()
    {
        try {

            // retrieve all adverts first
            $adverts = $this->getDoctrine()->getRepository(JobAdvert::class)->findAll();
        } catch (\Exception $e) {
            $adverts = json_encode([]);
        }
        $view = new View($adverts);
        $view->setTemplate('AlsaJobsBundle:Api:getAdverts.html.twig');

        return $this->handleView($view);
    }
}