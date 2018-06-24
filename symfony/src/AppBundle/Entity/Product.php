<?php
namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
* @ORM\Entity
* @ORM\Table(name="product")
*/
class Product
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	private $id;
	
	/**
	* @ORM\Column(type="string", length=100)
	*/
	private $name;
	
	/**
	 * @ORM\Column(type="integer", length=11)
	 */
	private $number;
	
	public function setNumber($number){
		$this->number = $number;
	}
	
	public function getNumber(){
		return $this->number;
	}
	
	/**
	 * @ORM\Column(type="string", length=100)
	 */
	private $avatar;
	
	public function getAvatar(){
		return $this->avatar;
	}
	
	public function setAvatar($avatar){
		$this->avatar = $avatar;
	}
	
	/**
	 * @ORM\Column(name="pro_images", type="string", length=100)
	 * @var name="pro_images[]"
	 */
	private $pro_images;
	
	/**
	 * Get images
	 *
	 * @return satelliteImage[]
	 */
	public function getPro_images(){
		return $this->pro_images;
	}
	
	// public function __construct() {
	// 	$this->pro_images = new ArrayCollection();
	// }
	
	/**
	 * @param string $pro_images
	 * @return satelliteImage[]
	 */
	public function setPro_images($pro_images){
		$this->pro_images = $pro_images;
		return $this;
	}
	
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
	
	public function setPrice($price){
		$this->price = $price;
	}
	
	public function getPrice(){
		return $this->price;
	}
	
	public function setDescription($description){
		$this->description = $description;
	}
	
	public function getDescription(){
		return $this->description;
	}
}