<?php

namespace Drupal\game_market\Entity;

use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Field\BaseFieldDefinition;

/**
 * Defines the Item entity.
 *
 * @ContentEntityType(
 *   id = "game_item",
 *   label = @Translation("Item"),
 *   base_table = "game_item",
 *   entity_keys = {
 *     "id" = "id",
 *     "uuid" = "uuid",
 *     "label" = "name"
 *   },
 *   handlers = {
 *     "list_builder" = "Drupal\Core\Entity\EntityListBuilder",
 *     "form" = {
 *       "add" = "Drupal\Core\Entity\ContentEntityForm",
 *       "edit" = "Drupal\Core\Entity\ContentEntityForm",
 *       "delete" = "Drupal\Core\Entity\ContentEntityDeleteForm"
 *     }
 *   },
 *   admin_permission = "administer game items",
 *   links = {
 *     "add-form" = "/admin/structure/game-item/add",
 *     "edit-form" = "/admin/structure/game-item/{game_item}/edit",
 *     "delete-form" = "/admin/structure/game-item/{game_item}/delete",
 *     "collection" = "/admin/structure/game-item"
 *   }
 * )
 */
class Item extends ContentEntityBase {

  public static function baseFieldDefinitions(EntityTypeInterface $entity_type) {
    $fields = parent::baseFieldDefinitions($entity_type);

    $fields['name'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Name'))
      ->setRequired(TRUE)
      ->setSettings(['max_length' => 255]);

    $fields['image'] = BaseFieldDefinition::create('image')
      ->setLabel(t('Image'))
      ->setSettings([
        'file_extensions' => 'png jpg jpeg',
        'alt_field_required' => FALSE,
      ]);

    return $fields;
  }
}
