<?php

namespace Drupal\ttask\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\views\ViewExecutableFactory;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Block that contain a node listing grouped by type.
 *
 * @Block(
 *   id = "ttask_node_listing",
 *   admin_label = @Translation("Node Listing Block"),
 * )
 */
class NodeListingBlock extends BlockBase implements ContainerFactoryPluginInterface {

  /**
   * The view executable factory.
   *
   * @var \Drupal\views\ViewExecutableFactory
   */
  protected $viewExecutableFactory;

  /**
   * The entity type manager.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityTypeManager;

  /**
   * Constructs a NodeListingBlock object.
   *
   * @param array $configuration
   *   A configuration array containing information about the plugin instance.
   * @param string $plugin_id
   *   The plugin_id for the plugin instance.
   * @param mixed $plugin_definition
   *   The plugin implementation definition.
   * @param \Drupal\views\ViewExecutableFactory $view_executable_factory
   *   The view executable factory.
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entity_type_manager
   *   The entity type manager.
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, ViewExecutableFactory $view_executable_factory, EntityTypeManagerInterface $entity_type_manager) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->viewExecutableFactory = $view_executable_factory;
    $this->entityTypeManager = $entity_type_manager;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('views.executable'),
      $container->get('entity_type.manager')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [];
    // Get the view machine id.
    $view_entity = $this->entityTypeManager->getStorage('view')->load('node_listing');

    if (!$view_entity) {
      $build['#markup'] = $this->t('This is no content');
      return $build;
    }

    $view = $this->viewExecutableFactory->get($view_entity);
    // Set the display machine id.
    $view->setDisplay('node_listing_block');
    $view->execute();

    // Return render array.
    return $view->render();
  }

}
