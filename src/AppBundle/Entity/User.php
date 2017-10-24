<?php

namespace AppBundle\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * User
 *
 * @ORM\Entity
 * @ORM\Table(name="user")
 * @ApiResource(
 *     collectionOperations={
 *         "get"={"method"="GET", "access_control"="is_granted('ROLE_EMPLOYE')"},
 *         "post"={"method"="POST"}
 *     },
 *     itemOperations={
 *         "get"={"method"="GET", "access_control"="(is_granted('ROLE_USER') and object.getId() == user.getId()) or is_granted('ROLE_EMPLOYE')"},
 *         "put"={"method"="PUT", "access_control"="(is_granted('ROLE_USER') and object.getId() == user.getId()) or is_granted('ROLE_ADMIN')"},
 *         "delete"={"method"="DELETE", "access_control"="is_granted('ROLE_ADMIN')"}
 *     },
 *     attributes={
 *          "normalization_context"={"groups"={"standard"}},
 *          "denormalization_context"={"groups"={"standard_write"}},
 *          "filters"={"user.search_filter"}
 *     }
 * )
 */
class User
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Groups({"standard"})
     */
    public $id;
    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Project", mappedBy="customer")
     */
    public $projects;
    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Project", mappedBy="EAteamUser")
     */
    public $EAprojects;
}
