<?php
namespace Plugin\ProductSeo\Entity;

use Doctrine\ORM\Mapping as ORM;
use Eccube\Annotation as Eccube;

/**
 * @Eccube\EntityExtension("Eccube\Entity\Product")
 */
trait ProductSeoProductTrait
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

}
