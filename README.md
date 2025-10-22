# Game Marketplace Module

A Drupal 11 custom module to create a marketplace for in-game items.  
Allows users to create listings, list items for sale, and view all items with a modal image preview.

---

## Features

- Create listings that reference items.
- Each listing can contain multiple items.
- Each item in a listing has a **price in gold** and a **quantity**.
- Listings have a **Discord Name** field.
- Listings and items displayed using Drupal Views.
- Vanilla JavaScript modal to preview item images (no jQuery required).
- Four main pages:
  - `/marketplace` → Overview of all listings.
  - `/marketplace/{listing}` → Detail page for a specific listing.
  - `/marketplace/items` → All items for sale across listings, shows Discord Name.
  - `/marketplace/mine` → Current user's listings.

---
