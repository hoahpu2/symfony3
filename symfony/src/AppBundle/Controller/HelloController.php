<?php
namespace AppBundle\Controller;

use AppBundle\Entity\Product;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\EmtityManagerInterface;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\TaskType;
use Symfony\Component\HttpFoundation\Session\Session;

class HelloController extends Controller{
	
	/**
	* @Route("/hello", name="hello");
	*/
	public function helloAction(){
		$entityManager = $this->getDoctrine()->getManager();
		$product = new Product();
		$product->setName('Keyboard');
		$product->setPrice(19.99);
		$product->setDescription('Ergonomic and stylish!!');
		
		$entityManager->persist($product);
		$entityManager->flush();
		
		
		
		return $this->render('hello/hello.html.twig', [
            'message' => 'Save new product with id: '.$product->getId()
        ]);
	}
	
	/**
	 * @Route("/{path}", name = "rewrite", requirements = { "path" = "[a-zA-Z]{3,}" })
	 */
	public function rewriteAction($path) {
		die('sdsds');
		$defaultLanguage = "de";
	
		return $this->redirect("$defaultLanguage/$path");
	
	}
	
	/**
	 * @Route("/admin/product/add/", name="add-product")
	 */
	public function addProduct(Request $request){
		
		$form = $this->createForm('AppBundle\Form\AddProduct',array(
				'action' => $this->generateUrl('add-product'),
				'method' => 'POST'
		));
		
		if ($request->isMethod('POST')) {
			
			// Refill the fields in case the form is not valid.
			$form->handleRequest($request);
			
			if($form->isSubmitted() && $form->isValid()){
				$file = $form->getData()['avatar'];
				$fileName = md5(uniqid()).'.'.$file->guessExtension();

				$file->move('upload/product', $fileName);
				
				$product = new Product();
				$entityManager = $this->getDoctrine()->getManager();
				$product = new Product();
				$product->setName($form->getData()['name']);
				$product->setPrice($form->getData()['price']);
				$product->setDescription($form->getData()['description']);
				$product->setAvatar($fileName);
				$product->setNumber($form->getData()['number']);
				$product->setPro_images('ahihi');
				
				$entityManager->persist($product);
				$entityManager->flush();
				
				$session = $request->getSession();
				$session->start();
					
				$session->getFlashBag()->add(
						'success',
						'insert success'
				);
				
				return $this->redirectToRoute('index-product');
			}
		}
		
		
		return $this->render('admin/product/add.html.twig', array(
				'form' => $form->createView()
		));

		if (!$request->request->get('name') && !$request->request->get('price') && !$request->request->get('avatar')){
			return $this->render('admin/product/add.html.twig');
		} else {
			$entityManager = $this->getDoctrine()->getManager();
			$product = new Product();
			
			if (!'png' == $request->files->get('avatar')->guessExtension() || !'jpg' == $request->files->get('avatar')->guessExtension()){
				return $this->render('admin/product/add.html.twig', [
		            'false' => 'File is not images'
		        ]);
			}
			$avatar = md5(uniqid()) . '.' . $request->files->get('avatar')->guessExtension();
			$request->files->get('avatar')->move('upload/product',$avatar);
			
			$a_Pro_Images = [];
			$Pro_images = $request->files->get('pro_images');
			foreach ($Pro_images as $value ){
				$imageName = md5(uniqid()) . '.' . $value->guessExtension();
				$a_Pro_Images[] = $imageName;
				$value->move('upload/product/pro_images',$imageName);
			}
			$a_Pro_Images = json_encode($a_Pro_Images);
			
			$product->setName($request->request->get('name'));
			$product->setPrice($request->request->get('price'));
			$product->setDescription($request->request->get('description'));
			$product->setNumber($request->request->get('number'));
			
			$product->setAvatar($avatar);
			$product->setPro_images($a_Pro_Images);
			
			$entityManager->persist($product);
			$entityManager->flush();
			
			$session = new Session();
			$session->start();
			
			$session->getFlashBag()->add(
					'success',
					'insert success'
			);
			
			return $this->redirectToRoute('index-product');
		}
	}
	
	/**
	 * @Route("/admin/product/index?page=1", name="index-product")
	 */
	public function index(Request $request){
		
		$em = $this->getDoctrine()->getManager();
		
		$queryBuilder = $em->getRepository(Product::class)->createQueryBuilder('bp');
		
		$query = $queryBuilder->getQuery();
		$paginator  = $this->get('knp_paginator');
		
		$blogPosts = $paginator->paginate(
				$query, /* query NOT result */
				$request->query->getInt('page', 2)/*page number*/,
            	$request->query->getInt('limit', 5)/*limit per page*/
		);
		
		return $this->render('admin/product/index.html.twig', [
				'blog_posts' => $blogPosts,
				]);
	}
	
	/**
	 * @Route("/admin/product/delete/{id}", name="delete-product")
	 */
	public function delete(Request $request, $id){
		$entityManager = $this->getDoctrine()->getManager();
		$product = $this->getDoctrine()->getRepository(Product::class)->find($id);
		
		if (!$product){
			return $this->redirectToRoute('index-product', [
				'false' => 'product not found'
			]);
		}
		
		$entityManager->remove($product);
		$entityManager->flush();
		
		$session = $request->getSession();
		$session->start();
			
		$session->getFlashBag()->add(
				'success',
				'delete success'
		);
		
		return $this->redirectToRoute('index-product', [
			'success' => 'delete success'
		]);
	}
	
	/**
	 * @Route("/admin/product/update/{id}", name="update-product")
	 */
	public function Update(Request $request, $id){
		$entityManager = $this->getDoctrine()->getManager();
		$product = $this->getDoctrine()->getRepository(Product::class)->find($id);
		
		if (!$product){
			
			$session = $request->getSession();
			$session->start();
				
			$session->getFlashBag()->add(
					'false',
					'product not found'
			);
			return $this->redirectToRoute('index-product', [
						'false' => 'product not found'
			]);
		}
		
		if (!$request->request->get('name')){
			return $this->render('admin/product/edit.html.twig', [
					'product' => $product
			]);
		}
		
		if ($request->files->get('avatar')){
			if (!'png' == $request->files->get('avatar')->guessExtension() || !'jpg' == $request->files->get('avatar')->guessExtension()){
				return $this->redirectToRoute('index-product', [
					'false' => 'file is not images'
				]);
			}
			$avatar = md5(uniqid()) . '.' . $request->files->get('avatar')->guessExtension();
			$request->files->get('avatar')->move('upload/product',$avatar);
		} else $avatar = $product->getAvatar();
		
		$product->setName($request->request->get('name'));
		$product->setPrice($request->request->get('price'));
		$product->setDescription($request->request->get('description'));
		$product->setNumber($request->request->get('number'));
			
		$product->setAvatar($avatar);
		$entityManager->flush();
		
		$session = $request->getSession();
		$session->start();
			
		$session->getFlashBag()->add(
				'success',
				'update success'
		);
		
		return $this->redirectToRoute('index-product');
	}
	
	/**
	* @Route("/hello/show12/{productId}") 
	*/
	public function showAction($productId){
		$product = $this->getDoctrine()->getRepository(Product::class)->find($productId);
		if(!$product){
			throw $this->createNotFoundException('No product found for id: '.$productId);
		}
		return $this->render('hello/hello.html.twig', [
			'message' => 'Product found is: '.$product->getId().'-'.$product->getName()
		]);
	}
}