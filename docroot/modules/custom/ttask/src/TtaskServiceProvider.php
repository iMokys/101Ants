<?php

namespace Drupal\ttask;

use Drupal\Core\DependencyInjection\ContainerBuilder;
use Drupal\Core\DependencyInjection\ServiceProviderBase;
use Drupal\ttask\Service\ExtendedTtaskService;

/**
 * Modifies the TtaskService service.
 */
class TtaskServiceProvider extends ServiceProviderBase {

  /**
   * {@inheritdoc}
   */
  public function alter(ContainerBuilder $container) {
    // Extend TtaskService functionality.
    if ($container->hasDefinition('ttask.service')) {
      $definition = $container->getDefinition('ttask.service');
      $definition->setClass(ExtendedTtaskService::class);
    }
  }

}
