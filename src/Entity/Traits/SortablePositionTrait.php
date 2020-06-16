<?php


namespace App\Entity\Traits;

use Gedmo\Mapping\Annotation as Gedmo;

trait SortablePositionTrait
{
    /**
     * @Gedmo\SortablePosition
     * @ORM\Column(name="position", type="integer")
     */
    private $position;

    /**
     * @return mixed
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @param mixed $position
     * @return SortablePositionTrait
     */
    public function setPosition($position)
    {
        $this->position = $position;
        return $this;
    }

}