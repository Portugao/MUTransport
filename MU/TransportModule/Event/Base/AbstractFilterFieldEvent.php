<?php
/**
 * Transport.
 *
 * @copyright Michael Ueberschaer (MU)
 * @license http://www.gnu.org/licenses/lgpl.html GNU Lesser General Public License
 * @author Michael Ueberschaer <info@homepages-mit-zikula.de>.
 * @link https://homepages-mit-zikula.de
 * @link https://ziku.la
 * @version Generated by ModuleStudio (https://modulestudio.de).
 */

namespace MU\TransportModule\Event\Base;

use Symfony\Component\EventDispatcher\Event;
use MU\TransportModule\Entity\FieldEntity;

/**
 * Event base class for filtering field processing.
 */
class AbstractFilterFieldEvent extends Event
{
    /**
     * @var FieldEntity Reference to treated entity instance.
     */
    protected $field;

    /**
     * @var array Entity change set for preUpdate events.
     */
    protected $entityChangeSet = [];

    /**
     * FilterFieldEvent constructor.
     *
     * @param FieldEntity $field Processed entity
     * @param array $entityChangeSet Change set for preUpdate events
     */
    public function __construct(FieldEntity $field, array $entityChangeSet = [])
    {
        $this->field = $field;
        $this->entityChangeSet = $entityChangeSet;
    }

    /**
     * Returns the entity.
     *
     * @return FieldEntity
     */
    public function getField()
    {
        return $this->field;
    }

    /**
     * Returns the change set.
     *
     * @return array Entity change set
     */
    public function getEntityChangeSet()
    {
        return $this->entityChangeSet;
    }
}
