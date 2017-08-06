<?php
/**
 * Transport.
 *
 * @copyright Michael Ueberschaer (MU)
 * @license http://www.gnu.org/licenses/lgpl.html GNU Lesser General Public License
 * @author Michael Ueberschaer <info@homepages-mit-zikula.de>.
 * @link https://homepages-mit-zikula.de
 * @link http://zikula.org
 * @version Generated by ModuleStudio (https://modulestudio.de).
 */

namespace MU\TransportModule\Entity\Factory\Base;

use MU\TransportModule\Entity\TableEntity;
use MU\TransportModule\Entity\DatabaseEntity;
use MU\TransportModule\Entity\FieldEntity;

/**
 * Entity initialiser class used to dynamically apply default values to newly created entities.
 */
abstract class AbstractEntityInitialiser
{
    /**
     * Initialises a given table instance.
     *
     * @param TableEntity $entity The newly created entity instance
     *
     * @return TableEntity The updated entity instance
     */
    public function initTable(TableEntity $entity)
    {

        return $entity;
    }

    /**
     * Initialises a given database instance.
     *
     * @param DatabaseEntity $entity The newly created entity instance
     *
     * @return DatabaseEntity The updated entity instance
     */
    public function initDatabase(DatabaseEntity $entity)
    {

        return $entity;
    }

    /**
     * Initialises a given field instance.
     *
     * @param FieldEntity $entity The newly created entity instance
     *
     * @return FieldEntity The updated entity instance
     */
    public function initField(FieldEntity $entity)
    {

        return $entity;
    }

}