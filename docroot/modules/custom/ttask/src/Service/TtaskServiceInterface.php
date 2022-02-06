<?php

namespace Drupal\ttask\Service;

/**
 * An interface for TtaskService.
 */
interface TtaskServiceInterface {

  /**
   * Get user label from current route.
   *
   * @return string
   *   The user label.
   */
  public function fetchUserByRoute(): string;

}
