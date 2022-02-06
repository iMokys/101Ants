<?php

namespace Drupal\ttask\Service;

use Drupal\node\NodeInterface;

/**
 * Class provide methods to get user info.
 */
class ExtendedTtaskService extends TtaskService implements ExtendedTtaskInterface {

  /**
   * {@inheritdoc}
   */
  public function fetchNodeByRoute(): ?NodeInterface {
    return $this->routeMatch->getParameter('node');
  }

}
