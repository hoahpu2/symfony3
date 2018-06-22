<?php
namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="product_images")
 */
class Product_images{
	/**
	 * @ORM\Column(type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;

	/**
	 * @ORM\Column(type="string", length=50)
	 */
	private $name;

	/**
	 * @ORM\Column(type="string", length=40)
	 */
	private $fullname;

	/**
	 * @ORM\Column(type="decimal", scale=2)
	 */
	private $price;

	/**
	 * @ORM\Column(type="text")
	 */
	private $description;

	public function getId(){
		return $this->id;
	}

	public function getName(){
		return $this->name;
	}

	public function setName($name){
		$this->name = $name;
	}

	public function setFullname($fullname){
		$this->fullname = $fullname;
	}

	public function getFullname(){
		return $this->fullname;
	}

	public function setPrice($price){
		$this->price = $price;
	}

	public function setDescription($description){
		$this->description = $description;
	}
}