<?php

namespace Drupal\ttask;

/**
 * Provides an interface NodeExtra.
 */
interface NodeExtraInterface {

  /**
   * Gets the node trimmed title.
   *
   * @return string
   *   Trimmed title of the node.
   */
  public function getTrimmedTitle(): string;

}
