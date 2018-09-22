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

namespace MU\TransportModule\Helper;

use MU\TransportModule\Helper\Base\AbstractControllerHelper;

/**
 * Helper implementation class for controller layer methods.
 */
class ControllerHelper extends AbstractControllerHelper
{
    public function getParameter($digit) {
    	$request = $this->requestStack->getCurrentRequest();
    	return $request->query->getDigits($digit);
    }
}
