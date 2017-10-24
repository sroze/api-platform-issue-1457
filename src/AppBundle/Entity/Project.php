<?php

namespace AppBundle\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

use Symfony\Component\Serializer\Annotation\Groups;
/**
 * Project
 *
 * @ORM\Entity
 * @ORM\Table(name="project")
 * @ApiResource(
 *     collectionOperations={
 *         "get"={"method"="GET"},
 *         "post"={"method"="POST"}
 *     },
 *     itemOperations={
 *         "get"={"method"="GET", "normalization_context"={"groups"={"detailsProject"}}},
 *         "put"={"method"="PUT"},
 *         "delete"={"method"="DELETE"}
 *     },
 *     attributes={
 *          "normalization_context"={"groups"={"standard"}},
 *          "denormalization_context"={"groups"={"standard_write"}},
 *          "filters"={"project.search_filter"}
 *     }
 * )
 */
class Project
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Groups({"standard","detailsProject"})
     */
    public $id;
    /**
     * @var \AppBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User", inversedBy="EAprojects")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="eateam_user_id", referencedColumnName="id")
     * })
     * @Groups({"detailsProject", "standard", "standard_write"})
     */
    public $EAteamUser;
    /**
     * @var \AppBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User", inversedBy="projects")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="customer_id", referencedColumnName="id")
     * })
     * @Groups({"standard", "standard_write"})
     */
    public $customer;
    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Ticket", mappedBy="project")
     * @Groups({"detailsProject"})
     */
    public $tickets;
}
