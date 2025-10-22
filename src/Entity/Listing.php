<?php

namespace Drupal\game_market\Entity;

use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Field\BaseFieldDefinition;

/**
 * Defines the Listing entity.
 *
 * @ContentEntityType(
 *   id = "game_listing",
 *   label = @Translation("Listing"),
 *   base_table = "game_listing",
 *   entity_keys = {
 *     "id" = "id",
 *     "uuid" = "uuid",
 *     "label" = "title"
 *   },
 *   handlers = {
 *     "list_builder" = "Drupal\Core\Entity\EntityListBuilder",
 *     "form" = {
 *       "add" = "Drupal\Core\Entity\ContentEntityForm",
 *       "edit" = "Drupal\Core\Entity\ContentEntityForm",
 *       "delete" = "Drupal\Core\Entity\ContentEntityDeleteForm"
 *     }
 *   },
 *   admin_permission = "administer game listings",
 *   links = {
 *     "add-form" = "/admin/structure/game-listing/add",
 *     "edit-form" = "/admin/structure/game-listing/{game_listing}/edit",
 *     "delete-form" = "/admin/structure/game-listing/{game_listing}/delete",
 *     "collection" = "/admin/structure/game-listing"
 *   }
 * )
 */
class Listing extends ContentEntityBase {

  public static function baseFieldDefinitions(EntityTypeInterface $entity_type) {
    $fields = parent::baseFieldDefinitions($entity_type);

    $fields['title'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Title'))
      ->setRequired(TRUE)
      ->setSettings(['max_length' => 255]);

    // Reference to child listing items.
    $fields['listing_items'] = BaseFieldDefinition::create('entity_reference')
      ->setLabel(t('Listing Items'))
      ->setSetting('target_type', 'listing_item')
      ->setCardinality(-1)
      ->setDisplayOptions('form', [
        'type' => 'entity_reference_autocomplete',
        'weight' => 0,
      ]);

    return $fields;
  }
}
