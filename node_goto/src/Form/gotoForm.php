<?php

/**
 * @file
 * Contains \Drupal\node_goto\Form\gotoForm.
 */

namespace Drupal\node_goto\Form;

use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Url;

class gotoForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'gotoform';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['node_id'] = array(
      '#type' => 'textfield',
      '#title' => 'Node ID',
      '#required' => True,
    );

    $form['submit'] = array(
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
    );

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    if(!is_numeric($form_state->getValue('node_id')))
      $form_state->setErrorByName('node_id', $this->t('Node ID must be ineger only'));
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $url = Url::fromUserInput('/node/'.$form_state->getValue('node_id'));
    $form_state->setRedirectUrl($url);
  }
}
