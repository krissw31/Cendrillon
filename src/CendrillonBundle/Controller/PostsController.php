<?php
/**
 * Created by PhpStorm.
 * User: krissw
 * Date: 21/07/2017
 * Time: 11:53
 */

namespace CendrillonBundle\Controller;


    use CendrillonBundle\Form\PostsType;
    use Symfony\Bundle\FrameworkBundle\Controller\Controller;
    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
    use CendrillonBundle\Entity\Posts;
    use Symfony\Component\HttpFoundation\Request;

    class PostsController extends Controller
    {
        const FILLE = "F";
        const GARCON = "G";
        const AMOUR = "amour";
        const AMITIE = "amitié";
        const SEXO = "sexo";
        const CONFIANCE = "confiance";



        /**
         * @Route("/posts", name="post")
         * @return \Symfony\Component\HttpFoundation\Response
         */

        public function postsAffichageByCat()
        {

            /**
             * @var $posts_amitie Posts

             */
            $posts_amitie = $this->getDoctrine()->getRepository("CendrillonBundle:Posts")->findBy(['categorie' => self::AMITIE]);
            $posts_amour = $this->getDoctrine()->getRepository("CendrillonBundle:Posts")->findBy(['categorie'=> self::AMOUR]);
            $posts_confiance = $this->getDoctrine()->getRepository("CendrillonBundle:Posts")->findBy(['categorie'=>self::CONFIANCE]);
            $posts_sexo = $this->getDoctrine()->getRepository("CendrillonBundle:Posts")->findBy(['categorie'=>self::SEXO]);



            /**
             * @var $posts_amitie Posts
             *
             */

            return $this->render("CendrillonBundle:Default:posts.html.twig", [
                "posts_amitie"=>$posts_amitie,
                "posts_amour"=>$posts_amour,
                "posts_confiance"=>$posts_confiance,
                "posts_sexo"=>$posts_sexo,

            ]);


        }

        /**
         * @Route("/post/delete/{id}", name="post.delete")
         * @param $post Posts
         * @return \Symfony\Component\HttpFoundation\RedirectResponse
         */
        public function deletePost(Posts $post)
        {
//dump($post);die();

            $em = $this->getDoctrine()->getManager();
            $em->remove($post);
            $em->flush();

            return $this->redirectToRoute("post");

       }

        /**
         * @Route("/post/edit/{id}", name="post.edit")
         * @param Posts $post
         * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
         */
       public function editPost(Posts $post, Request $request){
//           dump($post);die();
           $form = $this->createForm(PostsType::class, $post); //l'instancier

           $form->handleRequest($request);  //persister l'objet

            if ($form->isSubmitted() && $form->isValid()){
                $em = $this->getDoctrine()->getManager();
                $em->flush();

                return $this->redirectToRoute("post");
                }
                return $this->render("@Cendrillon/Default/postedit-form.html.twig",["form" => $form->createView(),"post" => $post]);


       }
//       /**
//        * @Route(/post/voir/{id})
//        *
//        */
//       public function  affichageComments(){
//            $comments = $this->getDoctrine()->getRepository()find
//       }
//
////        /**
////         * @Route("/post/edit/{id}", name="post.edit")
//         * @param Posts $posts
//         */
//       public function  editPost(Posts $posts, Request $request){
//           $form = $this->createForm(PageType::class, $posts);//l'instancier
//
//           $form->handleRequest($request);
//
//           if ($form->isSubmitted() && $form->isValid()) {
//               //Persister l'objet
//               $em = $this->getDoctrine()
//                   ->getManager();
//
//               $em->flush();
//               //rediriger vers la page d'accueil
//               return $this->redirectToRoute("admin.index");
//
//           }
//           return $this->render("@Blog/Admin/page-form.html.twig", ["form" => $form->createView(), "page" => $page]);
//
//
//       }
//        /**
//         * @Route("/postdelete")
//         * @param $id
//         * @return \Symfony\Component\HttpFoundation\Response
//         */
//        public function delete_formAction($id)
//        {
//            $deleteForm = $this->createDeleteForm($id);
//            return $this->render("@Cendrillon/Default/postdelete.html.twig",
//                array(
//                    'delete_form' => $deleteForm->createView(),
//                )
//            );
//        }

    }
