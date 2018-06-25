<?php
namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User implements UserInterface, \Serializable
	{
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
	private $email;

	/**
	 * @ORM\Column(type="string", length=100)
	 */
	private $password;

	/**
	 * @ORM\Column(type="string", length=10)
	 */
	private $roles;

	public function getId(){
		return $this->id;
	}

	public function getUsername(){
		return $this->name;
	}

	public function setName($name){
		$this->name = $name;
	}

	public function setEmail($email){
		$this->email = $email;
	}

	public function getEmail(){
		return $this->email;
	}

	public function setPassword($password){
		$this->password = $password;
	}
	
	public function getPassword(){
		return $this->password;
	}

	public function serialize(){
		return serialize([
			$this->id,
			$this->name,
			$this->password,
		]);
	}

	public function unserialize($serialized){
		list(
			$this->id,
			$this->name,
			$this->password,
		) = unserialize($serialized);
	}

	public function setRoles($roles){
		$this->roles = $roles;
	}

	public function getRoles(){
		return [
			'ROLE_USER',
		];
	}
	
	public function getSalt()
	{ 
		// you *may* need a real salt depending on your encoder
		// see section on salt below
		return null;
	}
	
	public function eraseCredentials()
	{
	}
	
}