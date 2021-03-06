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

namespace MU\TransportModule\Helper\Base;

use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Zikula\PermissionsModule\Api\ApiInterface\PermissionApiInterface;
use Zikula\UsersModule\Api\ApiInterface\CurrentUserApiInterface;
use Zikula\UsersModule\Entity\RepositoryInterface\UserRepositoryInterface;
use Zikula\UsersModule\Entity\UserEntity;

/**
 * Permission helper base class.
 */
abstract class AbstractPermissionHelper implements ContainerAwareInterface
{
    use ContainerAwareTrait;
    
    /**
     * @var RequestStack
     */
    protected $requestStack;
    
    /**
     * @var PermissionApiInterface
     */
    protected $permissionApi;
    
    /**
     * @var CurrentUserApiInterface
     */
    protected $currentUserApi;
    
    /**
     * @var UserRepositoryInterface
     */
    protected $userRepository;
    
    /**
     * PermissionHelper constructor.
     *
     * @param ContainerInterface      $container
     * @param RequestStack            $requestStack   RequestStack service instance
     * @param PermissionApiInterface  $permissionApi  PermissionApi service instance
     * @param CurrentUserApiInterface $currentUserApi CurrentUserApi service instance
     * @param UserRepositoryInterface $userRepository UserRepository service instance
     */
    public function __construct(
        ContainerInterface $container,
        RequestStack $requestStack,
        PermissionApiInterface $permissionApi,
        CurrentUserApiInterface $currentUserApi,
        UserRepositoryInterface $userRepository
    ) {
        $this->setContainer($container);
        $this->requestStack = $requestStack;
        $this->permissionApi = $permissionApi;
        $this->currentUserApi = $currentUserApi;
        $this->userRepository = $userRepository;
    }
    
    /**
     * Checks if the given entity instance may be read.
     *
     * @param object  $entity
     * @param integer $userId
     *
     * @return boolean
     */
    public function mayRead($entity, $userId = null)
    {
        return $this->hasEntityPermission($entity, ACCESS_READ, $userId);
    }
    
    /**
     * Checks if the given entity instance may be edited.
     *
     * @param object  $entity
     * @param integer $userId
     *
     * @return boolean
     */
    public function mayEdit($entity, $userId = null)
    {
        return $this->hasEntityPermission($entity, ACCESS_EDIT, $userId);
    }
    
    /**
     * Checks if the given entity instance may be deleted.
     *
     * @param object  $entity
     * @param integer $userId
     *
     * @return boolean
     */
    public function mayDelete($entity, $userId = null)
    {
        return $this->hasEntityPermission($entity, ACCESS_DELETE, $userId);
    }
    
    /**
     * Checks if a certain permission level is granted for the given entity instance.
     *
     * @param object  $entity
     * @param integer $permissionLevel
     * @param integer $userId
     *
     * @return boolean
     */
    public function hasEntityPermission($entity, $permissionLevel, $userId = null)
    {
        $objectType = $entity->get_objectType();
        $instance = $entity->getKey() . '::';
    
        return $this->permissionApi->hasPermission('MUTransportModule:' . ucfirst($objectType) . ':', $instance, $permissionLevel, $userId);
    }
    
    /**
     * Checks if a certain permission level is granted for the given object type.
     *
     * @param string  $objectType
     * @param integer $permissionLevel
     * @param integer $userId
     *
     * @return boolean
     */
    public function hasComponentPermission($objectType, $permissionLevel, $userId = null)
    {
        return $this->permissionApi->hasPermission('MUTransportModule:' . ucfirst($objectType) . ':', '::', $permissionLevel, $userId);
    }
    
    /**
     * Checks if a certain permission level is granted for the application in general.
     *
     * @param integer $permissionLevel
     * @param integer $userId
     *
     * @return boolean
     */
    public function hasPermission($permissionLevel, $userId = null)
    {
        return $this->permissionApi->hasPermission('MUTransportModule::', '::', $permissionLevel, $userId);
    }
    
    /**
     * Returns the list of user group ids of the current user.
     *
     * @return array List of group ids
     */
    public function getUserGroupIds()
    {
        $isLoggedIn = $this->currentUserApi->isLoggedIn();
        if (!$isLoggedIn) {
            return [];
        }
    
        $groupIds = [];
        $groups = $this->currentUserApi->get('groups');
        foreach ($groups as $group) {
            $groupIds[] = $group->getGid();
        }
    
    
        return $groupIds;
    }
    
    /**
     * Returns the the current user's id.
     *
     * @return integer
     */
    public function getUserId()
    {
        return $this->currentUserApi->get('uid');
    }
    
    /**
     * Returns the the current user's entity.
     *
     * @return UserEntity
     */
    public function getUser()
    {
        return $this->userRepository->find($this->getUserId());
    }
}
