<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller {

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request) {
        $users = json_decode(file_get_contents('./files/User.json', true));
        $artists = json_decode(file_get_contents('./files/Artist.json', true));
        $tunes = json_decode(file_get_contents('./files/Tune.json', true));
        $ratings = json_decode(file_get_contents('./files/UserRating.json', true));
        $this->createUsers($users);
        $this->createArtists($artists);
        $this->createTunes($tunes);
        $this->createUserRating($ratings);        

        return $this->redirectToRoute('userRating');
    }

    public function createUsers($datas) {
        $em = $this->getDoctrine()->getManager();
        foreach ($datas->user as $data) {

            $user = new \AppBundle\Entity\user();

            $identifiant = $data->_id;
            foreach ($identifiant as $id) {
                $user->setId($id);
            }
            $user->setUsername($data->username);
            $user->setFirstName($data->firstName);
            $user->setLastName($data->lastName);
            $em->persist($user);
            $em->flush();
        }
    }

    public function createArtists($datas) {
        $em = $this->getDoctrine()->getManager();
        foreach ($datas->artist as $data) {
            $artist = new \AppBundle\Entity\artist();

            $identifiant = $data->_id;
            foreach ($identifiant as $id) {
                $artist->setId($id);
            }

            $artist->setName($data->name);
            $em->persist($artist);
            $em->flush();
        }
    }

    public function createTunes($datas) {
        $em = $this->getDoctrine()->getManager();

        foreach ($datas->tune as $data) {

            $tune = new \AppBundle\Entity\tune();

            $identifiant = $data->_id;
            foreach ($identifiant as $id) {
                $tune->setId($id);
            }

            $artist = $data->artist;
            foreach ($artist as $key => $value) {
                if ($key == '$id') {
                    foreach ($value as $id) {

                        $artist = $em->getRepository('AppBundle:artist')->findOneBy(array('id' => $id));
                        $tune->setArtist($artist);
                    }
                }
            }


            $tune->setTitle($data->title);
            $em->persist($tune);
            $em->flush();
        }
    }

    public function createUserRating($datas) {
        $em = $this->getDoctrine()->getManager();

        foreach ($datas->rating as $data) {

            $userRating = new \AppBundle\Entity\userRating();

            $users = $data->user;
            foreach ($users as $key => $value) {
                if ($key == '$id') {
                    foreach ($value as $id) {

                        $user = $em->getRepository('AppBundle:user')->findOneBy(array('id' => $id));
                        $userRating->setUser($user);
                    }
                }
            }


            $tunes = $data->tune;
            foreach ($tunes as $key => $value) {
                if ($key == '$id') {
                    foreach ($value as $id) {

                        $tune = $em->getRepository('AppBundle:tune')->findOneBy(array('id' => $id));
                        $userRating->setTune($tune);
                    }
                }
            }



            $userRating->setRating($data->rating);
            $em->persist($userRating);
            $em->flush();
        }
    }

    /**
     * @Route("/user_rating", name="userRating")
     */
    public function allUserRating() {



        $em = $this->getDoctrine()->getManager();

        $users = $em->getRepository('AppBundle:user')->findAll();
        $userRatings = array();
        foreach ($users as $user) {

            $userRating = $em->getRepository('AppBundle:userRating')->getUserRating($user->getId());

            foreach ($userRating as $value) {

                $userRatings[$value->getUser()->getUsername()][$value->getTune()->getTitle()] = $value->getRating();
            }
        }


        $recommandations = $this->get('rating')->getRecommendations($userRatings, "amiled@ats-digital.com");

        return $this->render('AppBundle:default:recommander.html.twig', array(
                    'recommandations' => $recommandations,
        ));
    }

}
