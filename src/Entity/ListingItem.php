<?php

namespace Drupal\game_market\Entity;

use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Field\BaseFieldDefinition;

/**
 * Defines the Listing Item entity.
 *
 * @ContentEntityType(
 *   id = "listing_item",
 *   label = @Translation("Listing Item"),
 *   base_table = "listing_item",
 *   entity_keys = {
 *     "id" = "id",
 *     "uuid" = "uuid"
 *   },
 *   handlers = {
 *     "list_builder" = "Drupal\Core\Entity\EntityListBuilder",
 *     "form" = {
 *       "add" = "Drupal\Core\Entity\ContentEntityForm",
 *       "edit" = "Drupal\Core\Entity\ContentEntityForm",
 *       "delete" = "Drupal\Core\Entity\ContentEntityDeleteForm"
 *     }
 *   },
 *   admin_permission = "administer listing items",
 *   links = {
 *     "add-form" = "/admin/structure/listing-item/add",
 *     "edit-form" = "/admin/structure/listing-item/{listing_item}/edit",
 *     "delete-form" = "/admin/structure/listing-item/{listing_item}/delete",
 *     "collection" = "/admin/structure/listing-item"
 *   }
 * )
 */
class ListingItem extends ContentEntityBase {

  public static function baseFieldDefinitions(EntityTypeInterface $entity_type) {
    $fields = parent::baseFieldDefinitions($entity_type);

    $fields['item'] = BaseFieldDefinition::create('entity_reference')
      ->setLabel(t('Item'))
      ->setSetting('target_type', 'game_item')
      ->setRequired(TRUE);

    $fields['price'] = BaseFieldDefinition::create('integer')
      ->setLabel(t('Price (gold)'))
      ->setDescription(t('Price of this item in gold.'))
      ->setRequired(TRUE);

    $fields['quantity'] = BaseFieldDefinition::create('integer')
      ->setLabel(t('Quantity'))
      ->setDefaultValue(1);

    $fields['parent_listing'] = BaseFieldDefinition::create('entity_reference')
      ->setLabel(t('Parent Listing'))
      ->setSetting('target_type', 'game_listing')
      ->setRequired(TRUE);

    return $fields;
  }
}
