<?php

namespace Drupal\ttask\Entity;

use Drupal\node\Entity\Node as CoreNode;
use Drupal\ttask\NodeExtraInterface;

/**
 * Add extra functionality to Node Entity.
 */
class NodeExtra extends CoreNode implements NodeExtraInterface {

  /**
   * {@inheritdoc}
   */
  public function getTrimmedTitle(): string {
    $title = $this->getTitle();
    return trim(substr($title, 0, 10));
  }

}
