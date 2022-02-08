<?php

namespace Drupal\ttask\Access;

use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Routing\Access\AccessInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;
use Drupal\user\UserInterface;

/**
 * User access check class.
 */
class UserAccessCheck implements AccessInterface {

  /**
   * The entity type manager.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityTypeManager;

  /**
   * Constructs a new UserAccessCheck object.
   *
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entityTypeManager
   *   The entity type manager.
   */
  public function __construct(EntityTypeManagerInterface $entityTypeManager) {
    $this->entityTypeManager = $entityTypeManager;
  }

  /**
   * Checks access to user canonical route.
   *
   * @param \Drupal\Core\Session\AccountInterface $account
   *   The currently logged in account.
   * @param \Drupal\user\UserInterface $user
   *   The user object.
   */
  public function access(AccountInterface $account, UserInterface $user) {
    // Allow viewing own page.
    if ($user->id() === $account->id()) {
      return AccessResult::allowed()->addCacheableDependency($user);
    }

    // Forbid access in case "keep_private" was set.
    if ($user->get('field_view_access')->getString() === 'keep_private') {
      return AccessResult::forbidden()->addCacheableDependency($user);
    }

    return AccessResult::allowed()->addCacheableDependency($user);

  }

}
