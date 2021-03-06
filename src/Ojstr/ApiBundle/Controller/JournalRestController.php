<?php

namespace Ojstr\ApiBundle\Controller;

use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use FOS\RestBundle\Controller\Annotations\View as RestView;
use Ojstr\UserBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Util\Codes;
use Ojstr\UserBundle\Form\UserRestType;
use FOS\RestBundle\Controller\Annotations\Get;


class JournalRestController extends FOSRestController {
    /**
     *
     * @ApiDoc(
     *  resource=true,
     *  description="Get Journal Issues"
     * )
     * @Get("/journals/{id}/issues")
     */
    public function getJournalIssues($id) {
        return $id;
    }
    /**
     *
     * @ApiDoc(
     *  resource=true,
     *  description="Get Specific Journal"
     * )
     */
    public function getJournalAction($id) {
        $journal = $this->getDoctrine()->getRepository('OjstrJournalBundle:Journal')->find($id);
        if (!is_object($journal)) {
            throw new HttpException(404, 'Not found. The record is not found or route is not defined.');
        }
        return $journal;
    }
     

    /**
     *
     * @ApiDoc(
     *  resource=true,
     *  description="Get Specific Journal Of Users Action",
     *  parameters={
     *      {
     *          "name"="page",
     *          "dataType"="integer",
     *          "required"="true",
     *          "description"="offset page"
     *      },
     *      {
     *          "name"="limit",
     *          "dataType"="integer",
     *          "required"="true",
     *          "description"="limit"
     *      }
     *  }
     * )
     */
    public function getJournalUsersAction($id) {
        $limit = $request->get('limit');
        $page = $request->get('page');
        if (empty($limit)) {
            throw new HttpException(400, 'Missing parameter : limit');
        }
        if (empty($page)) {
            throw new HttpException(400, 'Missing parameter : page');
        }
        $users = $this->getDoctrine()->
                getRepository('OjstrUserBundle:UserJournalRole')
                ->createQueryBuilder()
                ->where('journal_id > :id')
                ->setParameter('id', $id)
                //->orderBy('id', 'ASC')
                ->setMaxResults($limit)
                ->setFirstResult($page)
                ->getQuery()
                ->getResults();
        return $users;
    }

}
