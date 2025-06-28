// Load Laravel's default bootstrap (includes Axios & Echo)
import './bootstrap';

// Import your custom community chat script
import './community-chat.js';

// Alpine.js for UI interactivity
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
