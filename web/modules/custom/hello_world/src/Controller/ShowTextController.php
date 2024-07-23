<?php

namespace Drupal\hello_world\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * ShowTextController
 */
class ShowTextController extends ControllerBase {

/**
 * Method showText
 *
 * @return array
 */
public function showText() : array {
  $user = $this->currentUser();
  if (\Drupal::currentUser()->hasPermission('custom_permission')) {
  $userName = \Drupal::currentUser()->getDisplayName();

  return [
    '#type' => 'markup',
    '#markup' => $this->t( string: "Hello babu". $user->getDisplayName() ),
      '#cache' => [
        // 'contexts' => ['user'],
        'tags' => ['user:'. $this->currentUser()->id()]
      ],
  ];
}
    return [
      '#type' => 'markup',
      '#markup' => 'No Permission',
      '#cache' => [
        'tags' => ['user:' . \Drupal::currentUser()->id()],
      ],
    ];
}
}
