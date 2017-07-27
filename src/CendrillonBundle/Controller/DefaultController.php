<?php

namespace CendrillonBundle\Controller;

use CendrillonBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    const FILLE = "F";
    const GARCON = "G";
    const AMOUR = "amour";
    const AMITIE = "amitié";
    const SEXO = "sexo";
    const CONFIANCE = "confiance";

    /**
     * @Route("/index",name="homepage")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAdminAction(){




        //Nombre d'utilisateurs
        $users = $this->getDoctrine()->getRepository("CendrillonBundle:User")->findAll();
        $nbUser=count($users);

        //nombre d'utilisateurs connectés
        $usersOnline = $this->getDoctrine()->getRepository("CendrillonBundle:Users_online")->findAll();
        $nbUsersOnline = count($usersOnline);

        //NOMBRE D'USERS MEN OU WOMEN CONNECTES:
        $usersOnline = $this->getDoctrine()->getRepository("CendrillonBundle:Users_online")->findAll();

        $nbUserOnlineMen = 0;
        $nbUserOnlineWomen = 0;
        foreach ($usersOnline as $userOnline){
            $user = $userOnline->getIDUser();
            /**
             * @var $user User
             */
            if ($user->getUserSexe() === self::GARCON){
                $nbUserOnlineMen++;
            }
            elseif ($user->getUserSexe() === self::FILLE){
                $nbUserOnlineWomen++;
            }
        }

        // NOMBRE DE COMMENTAIRE POSTES
        $comments = $this->getDoctrine()->getRepository("CendrillonBundle:Comments")->findAll();
        $nbComments=count($comments);

        //NOMBRE DE COMMENTAIRES POSTES PAR GARCON OU FILLE
        $nbCommentsMen = 0;
        $nbCommentsWomen = 0;

        //on parcourt tous les messages stockés dans la tableau
        foreach ($comments as $comment) {

            //on stock  les utilisateurs des messages
            $auteurComments = $comment->getCommentAuthor();

            /**
             * @var $auteurComment User
             */
            //on parcourt tous les USER stockés dans la tableau
            foreach ($auteurComments as $auteurComment) {
                if ($auteurComment->getUserSexe() === self::GARCON) {
                    // SI GARCON ON AJOUTE AU NOMBRE DE GARCON
                    $nbCommentsMen++;

                } else if ($auteurComment->getUserSexe() === self::FILLE) {
                    // SI FILLE ON AJOUTE AU NOMBRE DE FILLE
                    $nbCommentsWomen++;
                }
            }
        }

        //Nombre de posts
        $posts = $this->getDoctrine()->getRepository("CendrillonBundle:Posts")->findAll();
        $nbb=count($posts);

        //nombre d'utilisateurs filles
        $userfille = $this->getDoctrine()->getRepository("CendrillonBundle:User")->findBy(array('user_sexe'=>self::FILLE));
        $nbfille = count($userfille);

        //nombre d'utilisateurs garcons
        $usergarcon = $this->getDoctrine()->getRepository("CendrillonBundle:User")->findBy(array('user_sexe'=>self::GARCON));
        $nbgarcon = count($usergarcon);

        //nombre de conseillers
        $usersconseillers = $this->getDoctrine()->getRepository("CendrillonBundle:Conseiller")->findAll();
        $nbconseiller = count($usersconseillers);

        //nombre de conseillers filles
        $usersconseillersfilles = $this->getDoctrine()->getRepository("CendrillonBundle:Conseiller")->findBy(array("user_sexe"=>self::FILLE));
        $nbconseillerfille = count($usersconseillersfilles);

        //nombre de conseillers garcon
        $usersconseillersgarcons = $this->getDoctrine()->getRepository("CendrillonBundle:Conseiller")->findBy(array("user_sexe"=>self::GARCON));
        $nbconseillergarcon = count($usersconseillersgarcons);


        //Appel methode nombre de posts  postés dans chaque  categorie
        $nb_posts_amitie = $this->nbrePostsCategory(self::AMITIE);
        $nb_posts_confiance = $this->nbrePostsCategory(self::CONFIANCE);
        $nb_posts_amour = $this->nbrePostsCategory(self::AMOUR);
        $nb_posts_sexo = $this->nbrePostsCategory(self::SEXO);

        //Appel methode nombre de posts  postés par genre
        $nb_postsF = $this->nbrePostsUsersSexe(self::FILLE);
        $nb_postsG = $this->nbrePostsUsersSexe(self::GARCON);

        //------------------------------calculs nombre de posts en pourcentage;----------------------------


        $nb_posts = $nb_posts_amitie + $nb_posts_confiance + $nb_posts_amour+ $nb_posts_sexo;
        $pnbamitie = $nb_posts_amitie/$nb_posts;
        $pctamitie = $pnbamitie * 100;
        $pnbconfiance = $nb_posts_confiance/$nb_posts;
        $pctconfiance= $pnbconfiance*100;
        $pnbamour = $nb_posts_amour/$nb_posts;
        $pctamour = $pnbamour*100;
        $pnbsexo = $nb_posts_sexo/$nb_posts;
        $pctsexo = $pnbsexo*100;







        return $this->render('CendrillonBundle:Default:index.html.twig',
            [
                "users"=>$users,
                "posts"=>$posts,
                "nb_user"=>$nbUser,
                "nb_post"=>$nbb,
                "nb_user_online"=>$nbUsersOnline,
                "fille_user"=>$nbfille,
                "garcon_user"=>$nbgarcon,
                "conseiller_nb"=>$nbconseiller,
                "conseiller_nb_fille"=>$nbconseillerfille,
                "conseiller_nb_garcon"=>$nbconseillergarcon,
                "nb_postsG"=>$nb_postsG,
                "nb_postsF"=>$nb_postsF,
                "nb_posts_amitie"=>$nb_posts_amitie,
                "nb_posts_amour"=>$nb_posts_amour,
                "nb_posts_confiance"=>$nb_posts_confiance,
                "nb_posts_sexo"=>$nb_posts_sexo,
                "nbCommentsMen"=>$nbCommentsMen,
                "nbCommentsWomen"=>$nbCommentsWomen,
                "nbComment"=>$nbComments,
                "nb_posts"=>$nb_posts,
                "pctamitie"=>$pctamitie,
                "pnbamitie"=>$pnbamitie,
                "pnbconfiance"=>$pnbconfiance,
                "pctconfiance"=>$pctconfiance,
                "pnbamour"=>$pnbamour,
                 "pctamour"=>$pctamour,
                "pnbsexo"=>$pnbsexo,
                "pctsexo"=>$pctsexo
            ]);

    }


    /**
     * @Route("/age")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function ageActionAffichage()
    {

        //affichage des âges de tous les utilisateurs

        $users = $this->getDoctrine()->getRepository("CendrillonBundle:User")->findAll();
        $ages = array();


        foreach ($users as $user) {
            $ages[] = $user->getAge();
        }

        $ageMoyUsers = array_sum($ages)/count($ages);

        //affichage des âges  men users
        $agesMen = $this->ageUsersSexe(self::GARCON);
        //moyenne d'âge men
        $ageMoyMen = array_sum($agesMen)/count($agesMen);


        //affichage des âges women users
        $agesWomen = $this->ageUsersSexe(self::FILLE);
        //moyenne d'âge women
        $ageMoyWomen = array_sum($agesWomen)/count($agesWomen);

        //APPEL fonction pour recuperer äges categorie amour
        $agesCatAmour = $this->getAgeCaterogy("amour");
        $agesCatAmitie = $this->getAgeCaterogy("amitie");
        $agesCatConfiance = $this->getAgeCaterogy("confiance");
        $agesCatSexo = $this->getAgeCaterogy("sexo");

        //Moyennes d'âges pour chaque catégorie
//        $ageMoyCatAmour = array_sum($agesCatAmour)/count($agesCatAmour);
//        $ageMoyCatAmitie = array_sum($agesCatAmitie)/count($agesCatAmitie);
//        $ageMoyCatConfiance = array_sum($agesCatConfiance)/count($agesCatConfiance);
//        $ageMoyCatSexo = array_sum($agesCatSexo)/count($agesCatSexo);

        return $this->render("CendrillonBundle:Default:age.html.twig", [
            "ages" => $ages,
            "agesmen" => $agesMen,
            "ageswomen" => $agesWomen,
            "agesCatAmour"=>$agesCatAmour,
            "agesCatAmitie"=>$agesCatAmitie,
            "agesCatConfiance"=>$agesCatConfiance,
            "agesCatSexo"=>$agesCatSexo,
            "ageMoyUsers"=> $ageMoyUsers,
            "ageMoyMen"=>$ageMoyMen,
            "ageMoyWomen"=>$ageMoyWomen,
//            "ageMoyCatAmour"=>$ageMoyCatAmour,
//            "ageMoyCatAmitie"=>$ageMoyCatAmitie,
//            "ageMoyCatConfiance"=>$ageMoyCatConfiance,
//            "ageMoyCatSexo"=>$ageMoyCatSexo
            ]);

    }

    //-----------------------
    // METHODE
    //-----------------------


    public function nbrePostsUsersSexe($user_sexe)
    {
        $nb_posts = 0;
        $users = $this->getDoctrine()->getRepository('CendrillonBundle:User')->findBy(["user_sexe"=>$user_sexe]);

        foreach ($users as $user){
            $posts = $this->getDoctrine()->getRepository('CendrillonBundle:Posts')->findBy(["post_author"=>$user]);
            $nb =  intval(count($posts));
            $nb_posts = $nb_posts + $nb;
        }
        return $nb_posts;

    }
    public function nbrePostsCategory($categorie)
    {
        $posts_categorie = $this->getDoctrine()->getRepository("CendrillonBundle:Posts")->findBy(["categorie"=>$categorie]);
        $nb_posts_categorie = intval(count($posts_categorie));

        return $nb_posts_categorie;

    }

    public function ageUsersSexe($user_sexe)
    {
        $usersm = $this->getDoctrine()->getRepository('CendrillonBundle:User')->findBy(["user_sexe" => $user_sexe]);
        $agesmen = array();

        foreach ($usersm as $usermen) {
            $agesmen[] = $usermen->getAge();
        }
        return $agesmen;

    }
    public function nbreConnexionUsers(){
        //nombre des connexions par jour des utilisateurs.

    }
    public function getAgeCaterogy($category)
    {
        // ON RECUPERE TOUS LES POSTS DE LA CATEGORIE AMOUR
        $postCatAmour = $this->getDoctrine()->getRepository("CendrillonBundle:Posts")->findBy(["categorie" => $category]);

        // ON DECLARE LE TABLEAU DE DATE DE NAISSANCE
        $dateNaissances = [];

        // ON PARCOURT TOUS LES POSTS
        foreach ($postCatAmour as $post){
            /**
             * @var $user User
             */
            // ON RECUPERE L'USER DU POST
            $user = $post->getPostAuthor();

            // ON STOCK SON AGE DANS NOTRE TABLEAU
            $dateNaissances[] = $user->getAge();
        }

        return $dateNaissances;
    }

//    public function ageMoyenneCat($dateNaissance)
//    { $ageMoy = array_sum($dateNaissance)/count($dateNaissance);
//
//    }
    /**
     * @Route("/connexion")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getNbConnect()
    {
        //on recupere tous les utilisateurs
        $users = $this->getDoctrine()->getRepository("CendrillonBundle:User")->findAll();
        $nbConnectUser = 0;
        //on parcourt tous les utilisateurs
        foreach ($users as $user){
            $ConnectUser[] = $user->getLastConnexion();
            $nbConnectUser = count($ConnectUser);


        } return $this->render("CendrillonBundle:Default:connexion.html.twig",["nbConnectUser"=>$nbConnectUser]);

        //

}











}
