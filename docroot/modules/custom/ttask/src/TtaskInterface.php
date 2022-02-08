<?php

namespace Drupal\ttask;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface defining a ttask entity type.
 */
interface TtaskInterface extends ContentEntityInterface, EntityOwnerInterface, EntityChangedInterface {

}
