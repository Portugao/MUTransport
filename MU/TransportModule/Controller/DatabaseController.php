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

namespace MU\TransportModule\Controller;

use MU\TransportModule\Controller\Base\AbstractDatabaseController;

use RuntimeException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Zikula\ThemeModule\Engine\Annotation\Theme;
use MU\TransportModule\Entity\DatabaseEntity;

/**
 * Database controller class providing navigation and interaction functionality.
 */
class DatabaseController extends AbstractDatabaseController
{
    /**
     * @inheritDoc
     *
     * @Route("/admin/databases",
     *        methods = {"GET"}
     * )
     * @Theme("admin")
     *
     * @param Request $request Current request instance
     *
     * @return Response Output
     *
     * @throws AccessDeniedException Thrown if the user doesn't have required permissions
     */
    public function adminIndexAction(Request $request)
    {
        return parent::adminIndexAction($request);
    }
    
    /**
     * @inheritDoc
     *
     * @Route("/databases",
     *        methods = {"GET"}
     * )
     *
     * @param Request $request Current request instance
     *
     * @return Response Output
     *
     * @throws AccessDeniedException Thrown if the user doesn't have required permissions
     */
    public function indexAction(Request $request)
    {
        return parent::indexAction($request);
    }
    /**
     * @inheritDoc
     *
     * @Route("/admin/databases/view/{sort}/{sortdir}/{pos}/{num}.{_format}",
     *        requirements = {"sortdir" = "asc|desc|ASC|DESC", "pos" = "\d+", "num" = "\d+", "_format" = "html"},
     *        defaults = {"sort" = "", "sortdir" = "asc", "pos" = 1, "num" = 10, "_format" = "html"},
     *        methods = {"GET"}
     * )
     * @Theme("admin")
     *
     * @param Request $request Current request instance
     * @param string $sort         Sorting field
     * @param string $sortdir      Sorting direction
     * @param int    $pos          Current pager position
     * @param int    $num          Amount of entries to display
     *
     * @return Response Output
     *
     * @throws AccessDeniedException Thrown if the user doesn't have required permissions
     */
    public function adminViewAction(Request $request, $sort, $sortdir, $pos, $num)
    {
        return parent::adminViewAction($request, $sort, $sortdir, $pos, $num);
    }
    
    /**
     * @inheritDoc
     *
     * @Route("/databases/view/{sort}/{sortdir}/{pos}/{num}.{_format}",
     *        requirements = {"sortdir" = "asc|desc|ASC|DESC", "pos" = "\d+", "num" = "\d+", "_format" = "html"},
     *        defaults = {"sort" = "", "sortdir" = "asc", "pos" = 1, "num" = 10, "_format" = "html"},
     *        methods = {"GET"}
     * )
     *
     * @param Request $request Current request instance
     * @param string $sort         Sorting field
     * @param string $sortdir      Sorting direction
     * @param int    $pos          Current pager position
     * @param int    $num          Amount of entries to display
     *
     * @return Response Output
     *
     * @throws AccessDeniedException Thrown if the user doesn't have required permissions
     */
    public function viewAction(Request $request, $sort, $sortdir, $pos, $num)
    {
        return parent::viewAction($request, $sort, $sortdir, $pos, $num);
    }
    /**
     * @inheritDoc
     *
     * @Route("/admin/database/{id}.{_format}",
     *        requirements = {"id" = "\d+", "_format" = "html"},
     *        defaults = {"_format" = "html"},
     *        methods = {"GET"}
     * )
     * @Theme("admin")
     *
     * @param Request $request Current request instance
     * @param DatabaseEntity $database Treated database instance
     *
     * @return Response Output
     *
     * @throws AccessDeniedException Thrown if the user doesn't have required permissions
     * @throws NotFoundHttpException Thrown by param converter if database to be displayed isn't found
     */
    public function adminDisplayAction(Request $request, DatabaseEntity $database)
    {
        return parent::adminDisplayAction($request, $database);
    }
    
    /**
     * @inheritDoc
     *
     * @Route("/database/{id}.{_format}",
     *        requirements = {"id" = "\d+", "_format" = "html"},
     *        defaults = {"_format" = "html"},
     *        methods = {"GET"}
     * )
     *
     * @param Request $request Current request instance
     * @param DatabaseEntity $database Treated database instance
     *
     * @return Response Output
     *
     * @throws AccessDeniedException Thrown if the user doesn't have required permissions
     * @throws NotFoundHttpException Thrown by param converter if database to be displayed isn't found
     */
    public function displayAction(Request $request, DatabaseEntity $database)
    {
        return parent::displayAction($request, $database);
    }
    /**
     * @inheritDoc
     *
     * @Route("/admin/database/edit/{id}.{_format}",
     *        requirements = {"id" = "\d+", "_format" = "html"},
     *        defaults = {"id" = "0", "_format" = "html"},
     *        methods = {"GET", "POST"}
     * )
     * @Theme("admin")
     *
     * @param Request $request Current request instance
     *
     * @return Response Output
     *
     * @throws AccessDeniedException Thrown if the user doesn't have required permissions
     * @throws NotFoundHttpException Thrown by form handler if database to be edited isn't found
     * @throws RuntimeException      Thrown if another critical error occurs (e.g. workflow actions not available)
     */
    public function adminEditAction(Request $request)
    {
        return parent::adminEditAction($request);
    }
    
    /**
     * @inheritDoc
     *
     * @Route("/database/edit/{id}.{_format}",
     *        requirements = {"id" = "\d+", "_format" = "html"},
     *        defaults = {"id" = "0", "_format" = "html"},
     *        methods = {"GET", "POST"}
     * )
     *
     * @param Request $request Current request instance
     *
     * @return Response Output
     *
     * @throws AccessDeniedException Thrown if the user doesn't have required permissions
     * @throws NotFoundHttpException Thrown by form handler if database to be edited isn't found
     * @throws RuntimeException      Thrown if another critical error occurs (e.g. workflow actions not available)
     */
    public function editAction(Request $request)
    {
        return parent::editAction($request);
    }
    /**
     * @inheritDoc
     *
     * @Route("/admin/database/delete/{id}.{_format}",
     *        requirements = {"id" = "\d+", "_format" = "html"},
     *        defaults = {"_format" = "html"},
     *        methods = {"GET", "POST"}
     * )
     * @Theme("admin")
     *
     * @param Request $request Current request instance
     * @param DatabaseEntity $database Treated database instance
     *
     * @return Response Output
     *
     * @throws AccessDeniedException Thrown if the user doesn't have required permissions
     * @throws NotFoundHttpException Thrown by param converter if database to be deleted isn't found
     * @throws RuntimeException      Thrown if another critical error occurs (e.g. workflow actions not available)
     */
    public function adminDeleteAction(Request $request, DatabaseEntity $database)
    {
        return parent::adminDeleteAction($request, $database);
    }
    
    /**
     * @inheritDoc
     *
     * @Route("/database/delete/{id}.{_format}",
     *        requirements = {"id" = "\d+", "_format" = "html"},
     *        defaults = {"_format" = "html"},
     *        methods = {"GET", "POST"}
     * )
     *
     * @param Request $request Current request instance
     * @param DatabaseEntity $database Treated database instance
     *
     * @return Response Output
     *
     * @throws AccessDeniedException Thrown if the user doesn't have required permissions
     * @throws NotFoundHttpException Thrown by param converter if database to be deleted isn't found
     * @throws RuntimeException      Thrown if another critical error occurs (e.g. workflow actions not available)
     */
    public function deleteAction(Request $request, DatabaseEntity $database)
    {
        return parent::deleteAction($request, $database);
    }
    /**
     * @inheritDoc
     *
     * @Route("/admin/databases/select2Databases",
     *        methods = {"GET", "POST"}
     * )
     * @Theme("admin")
     *
     * @param Request $request Current request instance
     *
     * @return Response Output
     *
     * @throws AccessDeniedException Thrown if the user doesn't have required permissions
     */
    public function adminSelect2DatabasesAction(Request $request)
    {
        return parent::adminSelect2DatabasesAction($request);
    }
    
    /**
     * @inheritDoc
     *
     * @Route("/databases/select2Databases",
     *        methods = {"GET", "POST"}
     * )
     *
     * @param Request $request Current request instance
     *
     * @return Response Output
     *
     * @throws AccessDeniedException Thrown if the user doesn't have required permissions
     */
    public function select2DatabasesAction(Request $request)
    {
        return parent::select2DatabasesAction($request);
    }

    /**
     * Process status changes for multiple items.
     *
     * This function processes the items selected in the admin view page.
     * Multiple items may have their state changed or be deleted.
     *
     * @Route("/admin/databases/handleSelectedEntries",
     *        methods = {"POST"}
     * )
     * @Theme("admin")
     *
     * @param Request $request Current request instance
     *
     * @return RedirectResponse
     *
     * @throws RuntimeException Thrown if executing the workflow action fails
     */
    public function adminHandleSelectedEntriesAction(Request $request)
    {
        return parent::adminHandleSelectedEntriesAction($request);
    }
    
    /**
     * Process status changes for multiple items.
     *
     * This function processes the items selected in the admin view page.
     * Multiple items may have their state changed or be deleted.
     *
     * @Route("/databases/handleSelectedEntries",
     *        methods = {"POST"}
     * )
     *
     * @param Request $request Current request instance
     *
     * @return RedirectResponse
     *
     * @throws RuntimeException Thrown if executing the workflow action fails
     */
    public function handleSelectedEntriesAction(Request $request)
    {
        return parent::handleSelectedEntriesAction($request);
    }
    
    /**
     * This method includes the common implementation code for adminSelect2Databases() and select2Databases().
     */
    protected function select2DatabasesInternal(Request $request, $isAdmin = false)
    {
    	// parameter specifying which type of objects we are treating
    	$objectType = 'database';
    	$permLevel = $isAdmin ? ACCESS_ADMIN : ACCESS_EDIT;
    	if (!$this->hasPermission('MUTransportModule:' . ucfirst($objectType) . ':', '::', $permLevel)) {
    		throw new AccessDeniedException();
    	}
    	$templateParameters = [
    			'routeArea' => $isAdmin ? 'admin' : ''
    	];
    
    	$controllerHelper = $this->get('mu_transport_module.controller_helper');
    	$templateParameters = $controllerHelper->processEditActionParameters($objectType, $templateParameters);
    
    	// delegate form processing to the form handler
    	$formHandler = $this->get('mu_transport_module.form.handler.database');
    	$result = $formHandler->processForm($templateParameters);
    	if ($result instanceof RedirectResponse) {
    		return $result;
    	}
    
    	$templateParameters = $formHandler->getTemplateParameters();
    
    	// fetch and return the appropriate template
    	return $this->get('mu_transport_module.view_helper')->processTemplate($objectType, 'select2databases', $templateParameters);
 
    }
    
    /**
     * This method includes the common implementation code for adminEdit() and edit().
     */
    protected function editInternal(Request $request, $isAdmin = false)
    {
    	// parameter specifying which type of objects we are treating
    	$objectType = 'database';
    	$permLevel = $isAdmin ? ACCESS_ADMIN : ACCESS_EDIT;
    	if (!$this->hasPermission('MUTransportModule:' . ucfirst($objectType) . ':', '::', $permLevel)) {
    		throw new AccessDeniedException();
    	}
    	$templateParameters = [
    			'routeArea' => $isAdmin ? 'admin' : ''
    	];
    
    	$controllerHelper = $this->get('mu_transport_module.controller_helper');
    	$templateParameters = $controllerHelper->processEditActionParameters($objectType, $templateParameters);
    
    	// delegate form processing to the form handler
    	$formHandler = $this->get('mu_transport_module.form.handler.database');
    	$result = $formHandler->processForm($templateParameters);
    	if ($result instanceof RedirectResponse) {
    		return $result;
    	}
    
    	$templateParameters = $formHandler->getTemplateParameters();
    
    	// fetch and return the appropriate template
    	return $this->get('mu_transport_module.view_helper')->processTemplate($objectType, 'edit', $templateParameters);
    }

    // feel free to add your own controller methods here
}
