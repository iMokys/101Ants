<?php

namespace Drupal\ttask\Form;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Form controller for the ttask entity edit forms.
 */
class TtaskForm extends ContentEntityForm {

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $result = parent::save($form, $form_state);

    $entity = $this->getEntity();

    $message_arguments = ['%label' => $entity->toLink()->toString()];
    $logger_arguments = [
      '%label' => $entity->label(),
      'link' => $entity->toLink($this->t('View'))->toString(),
    ];

    switch ($result) {
      case SAVED_NEW:
        $this->messenger()->addStatus($this->t('New ttask %label has been created.', $message_arguments));
        $this->logger('ttask')->notice('Created new ttask %label', $logger_arguments);
        break;

      case SAVED_UPDATED:
        $this->messenger()->addStatus($this->t('The ttask %label has been updated.', $message_arguments));
        $this->logger('ttask')->notice('Updated ttask %label.', $logger_arguments);
        break;
    }

    $form_state->setRedirect('entity.ttask.canonical', ['ttask' => $entity->id()]);

    return $result;
  }

}
