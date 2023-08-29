<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\PrepackRepository;
use Symfony\Component\HttpFoundation\Request;
class PrepackController extends AbstractController
{
    private PrepackRepository $prepackRepository;

    public function __construct(PrepackRepository $prepackRepository)
    {
        $this->prepackRepository = $prepackRepository;
    }

    public function list(Request $request): Response
    {
        $dateFilter = $request->query->get('dateFilter');
        $trackingFilter = $request->query->get('trackingFilter');

        $prepacks = $this->prepackRepository->findAllOrderedByImportantFields($dateFilter, $trackingFilter);

        return $this->render('prepack/list.html.twig', [
            'prepacks' => $prepacks,
            'dateFilter' => $dateFilter,
            'trackingFilter' => $trackingFilter,
        ]);
    }
}