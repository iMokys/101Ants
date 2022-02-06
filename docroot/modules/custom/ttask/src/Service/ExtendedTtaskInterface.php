<?php

namespace Drupal\ttask\Service;

use Drupal\node\NodeInterface;

/**
 * An interface for ExtendedTtaskService.
 */
interface ExtendedTtaskInterface {

  /**
   * Get node object from route.
   *
   * @return \Drupal\node\NodeInterface|null
   *   The node object, otherwise null.
   */
  public function fetchNodeByRoute(): ?NodeInterface;

}
