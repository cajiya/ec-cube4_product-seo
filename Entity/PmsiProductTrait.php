<?php
namespace Plugin\ProductMetaSeoIngenuity43\Entity;

use Doctrine\ORM\Mapping as ORM;
use Eccube\Annotation as Eccube;

/**
 * @Eccube\EntityExtension("Eccube\Entity\Product")
 */
trait PmsiProductTrait
{

    /**
     * @var string
     *
     * @ORM\Column(name="pseo_title", type="string", nullable=true)
     */
    private $pseo_title;

    /**
     * @var string
     *
     * @ORM\Column(name="pseo_description", type="string", nullable=true)
     */
    private $pseo_description;

    /**
     * @var string
     *
     * @ORM\Column(name="pseo_robots", type="string", nullable=true , options={"default" : "index,follow"})
     */
    private $pseo_robots;


    /**
     * @return string
     */
    public function getPseoTitle()
    {
        return $this->pseo_title;
    }

    /**
     * @param string $pseo_title
     */
    public function setPseoTitle($pseo_title)
    {
        $this->pseo_title = $pseo_title;
    }

    /**
     * @return string
     */
    public function getPseoDescription()
    {
        return $this->pseo_description;
    }

    /**
     * @param string $pseo_description
     */
    public function setPseoDescription($pseo_description)
    {
        $this->pseo_description = $pseo_description;
    }

    /**
     * @return boolean
     */
    public function getPseoRobots()
    {
        return $this->pseo_robots;
    }

    /**
     * @param boolean $pseo_robots
     */
    public function setPseoRobots($pseo_robots)
    {
        $this->pseo_robots = $pseo_robots;
    }
}
