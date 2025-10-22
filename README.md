# Game Marketplace Module

A Drupal 10/11 custom module to create a marketplace for in-game items.  
Allows users to create listings, list items for sale, and view all items with a modal image preview.

## Features
- Listings and items
- Price in gold and quantity
- Discord Name field for each listing
- Vanilla JS modal for images
- Pages: /marketplace, /marketplace/{listing}, /marketplace/items, /marketplace/mine

## Installation
1. Copy `game_market` folder into modules/custom/
2. Enable the module with `drush en game_market -y`
3. Clear cache: `drush cr`