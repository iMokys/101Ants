<?php

namespace Drupal\ttask\Service;

use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Routing\RouteMatchInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\user\UserInterface;

/**
 * Class provide methods to get user info.
 */
class TtaskService implements TtaskServiceInterface {

  /**
   * The current user.
   *
   * @var \Drupal\Core\Session\AccountInterface
   */
  protected $currentUser;

  /**
   * The route match.
   *
   * @var \Drupal\Core\Routing\RouteMatchInterface
   */
  protected $routeMatch;

  /**
   * The user storage.
   *
   * @var \Drupal\user\UserStorageInterface
   */
  protected $userStorage;

  /**
   * Constructs a new TtaskService object.
   *
   * @param \Drupal\Core\Routing\RouteMatchInterface $route_match
   *   Current route match service.
   * @param \Drupal\Core\Session\AccountInterface $current_user
   *   The current user.
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entity_type_manager
   *   The entity type manager.
   *
   * @throws \Drupal\Component\Plugin\Exception\InvalidPluginDefinitionException
   * @throws \Drupal\Component\Plugin\Exception\PluginNotFoundException
   */
  public function __construct(RouteMatchInterface $route_match, AccountInterface $current_user, EntityTypeManagerInterface $entity_type_manager) {
    $this->routeMatch = $route_match;
    $this->currentUser = $current_user;
    $this->userStorage = $entity_type_manager->getStorage('user');
  }

  /**
   * {@inheritdoc}
   */
  public function fetchUserByRoute(): string {
    /** @var \Drupal\Core\Session\AccountProxyInterface $account */
    $user = $this->routeMatch->getParameter('user');
    if (!$user instanceof UserInterface) {
      $user = $this->userStorage->load($this->currentUser->id());
    }
    return $user->label();
  }

}
