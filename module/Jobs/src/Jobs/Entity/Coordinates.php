<?php
/**
 * YAWIK
 *
 * @filesource
 * @copyright (c) 2013-2015 Cross Solution (http://cross-solution.de)
 * @license   MIT
 */

/** Coordinates.php */
namespace Jobs\Entity;

use Core\Entity\AbstractEntity;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Zend\Json\Json;

/**
 * Coordinate of a job position
 *
 * @ODM\EmbeddedDocument
 *
 */
class Coordinates extends AbstractEntity implements CoordinatesInterface
{
    /**
     * The GeoJSON type
     *
     * @var string
     * @ODM\String
     */
    protected $type;

    /**
     * The GeoJSON coordinates.
     *
     * This is an array which format depends on the $type beeing used.
     *
     * @var array
     * @ODM\Collection
     */
    protected $coordinates;

    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setCoordinates(array $coordinates)
    {
        $this->coordinates = $coordinates;

        return $this;
    }

    public function getCoordinates()
    {
        return $this->coordinates;
    }

    public function toJson()
    {
        $data = [
            'type' => $this->getType(),
            'coordinates' => $this->getCoordinates(),
        ];

        return Json::encode($data);
    }

}
