<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\PrepackRepository;
use Symfony\Component\HttpFoundation\Request;
use Knp\Component\Pager\PaginatorInterface;

class PrepackController extends AbstractController
{
    private PrepackRepository $prepackRepository;

    public function __construct(PrepackRepository $prepackRepository)
    {
        $this->prepackRepository = $prepackRepository;
    }

    public function list(Request $request, PaginatorInterface $paginator): Response
    {
        $dateFilter = $request->query->get('dateFilter');
        $trackingFilter = $request->query->get('trackingFilter');
        $recordsPerPage = empty($request->query->get('recordsPerPage')) ? 10 : $request->query->get('recordsPerPage');

        $prepacks = $this->prepackRepository->findAllOrderedByImportantFields($dateFilter, $trackingFilter);

        $pagination = $paginator->paginate(
            $prepacks, // Query to paginate
            $request->query->getInt('page', 1), // Current page number
            $recordsPerPage // Items per page
        );

        return $this->render('prepack/list.html.twig', [
            'prepacks' => $pagination,
            'dateFilter' => $dateFilter,
            'trackingFilter' => $trackingFilter,
            'recordsPerPage' => $recordsPerPage,
        ]);
    }
}