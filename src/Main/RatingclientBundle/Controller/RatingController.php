<?php

namespace Main\RatingclientBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;


class RatingController extends Controller
{
    public function showRateAction($id, Request $request)
    {
        $ratingManager = $this->container->get('dcs_rating.manager.rating');

        if (null === $rating = $ratingManager->findOneById($id)) {
            $rating = $ratingManager->createRating($id);
            $ratingManager->saveRating($rating);
        }

        return $this->render('MainRatingclientBundle:Rating:star.html.twig', array(
            'rating' => $rating,
            'rate'   =>  $rating->getRate(),
            'maxValue' => 4//$this->container->getParameter('dcs_rating.max_value'),
        ));
    }

    public function controlAction($id)
    {
        $ratingManager = $this->container->get('dcs_rating.manager.rating');

        if (null === $rating = $ratingManager->findOneById($id)) {
            $rating = $ratingManager->createRating($id);
            $ratingManager->saveRating($rating);
        }

        // check if the user has permission to express the vote on entity Rating
        if (!$this->container->get('security.context')->isGranted($rating->getSecurityRole())) {
            $viewName = 'star';
        } else {
            // check if the voting system allows multiple votes. Otherwise
            // check if the user has already expressed a preference
            if (!$this->container->getParameter('dcs_rating.unique_vote')) {
                $viewName = 'choice';
            } else {
                $vote = $this->container->get('dcs_rating.manager.vote')
                    ->findOneByRatingAndVoter($rating, $this->getUser());

                $viewName = null === $vote ? 'choice' : 'star';
            }
        }
        // calcule rate des deals de chaque partenaire

        $deal=$this->getDoctrine()->getRepository('BackDealBundle:Deal')->find($rating->getId());
        //deal.planning.defaultannexe.protocol.user
        $partner= $deal->getPlanning()->getDefaultannexe()->getProtocol()->getUser();

        $deals=$this->getDoctrine()->getRepository('BackDealBundle:Deal')->getDealsByUser($partner);
        $nb=0;
        $total=0;
        foreach($deals as $value) {
             $iddeal = $value->getId();

            $ratedeal = $this->getDoctrine()->getRepository('BackDealBundle:Rating')->find($iddeal);

            if ($ratedeal != null && count($ratedeal->getVotes())>0 ) {

                 $total += $ratedeal->getRate();
                ++$nb;
            }
        }
        if($nb==0) $nb=1;
        $total=$total/$nb;

        return $this->render('MainRatingclientBundle:Rating:star.html.twig', array(
            'rating' => $rating,
            'rate'   => $total,
            'params' => $this->container->get('request')->get('params', array()),
            'maxValue' => $this->container->getParameter('dcs_rating.max_value'),
        ));
    }

    public function addVoteAction($id, $value)
    {
        if (null === $rating = $this->container->get('dcs_rating.manager.rating')->findOneById($id)) {
            throw new NotFoundHttpException('Rating not found');
        }

        if (null === $rating->getSecurityRole() || !$this->container->get('security.context')->isGranted($rating->getSecurityRole())) {
            throw new AccessDeniedHttpException('You can not perform the evaluation');
        }

        $maxValue = $this->container->getParameter('dcs_rating.max_value');

        if (!is_numeric($value) || $value < 0 || $value > $maxValue) {
            throw new BadRequestHttpException(sprintf('You must specify a value between 0 and %d', $maxValue));
        }

        $user = $this->getUser();
        $voteManager = $this->container->get('dcs_rating.manager.vote');

        if ($this->container->getParameter('dcs_rating.unique_vote') &&
            null !== $voteManager->findOneByRatingAndVoter($rating, $user)
        ) {
            throw new AccessDeniedHttpException('You have already rated');
        }

        $vote = $voteManager->createVote($rating, $user);
        $vote->setValue($value);

        $voteManager->saveVote($vote);

        $request = $this->container->get('request');

        if ($request->isXmlHttpRequest()) {
            return $this->forward('MainRatingclientBundle:Rating:showRate', array(
                'id' => $rating->getId()
            ));
        }

        if (null === $redirectUri = $request->headers->get('referer', $rating->getPermalink())) {
            $pathToRedirect = $this->container->getParameter('dcs_rating.base_path_to_redirect');
            if ($this->container->get('router')->getRouteCollection()->get($pathToRedirect)) {
                $redirectUri = $this->generateUrl($pathToRedirect);
            } else {
                $redirectUri = $pathToRedirect;
            }
        }

        return $this->redirect($redirectUri);
    }


}
