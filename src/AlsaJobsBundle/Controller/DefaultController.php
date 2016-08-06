<?php

namespace AlsaJobsBundle\Controller;

use AlsaJobsBundle\Entity\JobAdvert;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request)
    {
        $adverts = $this->getDoctrine()->getRepository(JobAdvert::class)->findAll();
        return $this->render('AlsaJobsBundle:Default:index.html.twig', [
           'adverts' => $adverts,
        ]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function updateJobsAction(Request $request)
    {
        $advertsData = $this->get('alsajobs.adverts')->getData();
        $em = $this->getDoctrine()->getManager();
        foreach ($advertsData as $item) {
            // get only new adverts
            if (!$em->getRepository(JobAdvert::class)->findOneBy(['link' => $item->link])) {
                $advert = new JobAdvert();
                $em->persist($advert);
                $advert->setTitle($item->title)
                    ->setDescription($item->description)
                    ->setDate(new \DateTime($item->date))
                    ->setLink($item->link);
            }
        }
        $em->flush();
        return $this->redirectToRoute('default_index');
    }
}
