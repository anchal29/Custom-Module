<?php

/**
 * @file
 * Contains \Drupal\node_goto\Plugin\Block\gotoBlock
 */

namespace Drupal\node_goto\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormInterface;

/**
 * Provides a node goto form-block.
 *
 * @Block(
 *   id = "node_goto_block",
 *   admin_label = @Translation("Node Goto Block"),
 *   category = @Translation("Blocks")
 * )
 */
class gotoBlock extends BlockBase {

  /**
  * {@inheritdoc}
  */
  public function build() {
    $form = \Drupal::formBuilder()->getForm('Drupal\node_goto\Form\gotoForm');

    return $form;
  }

}
