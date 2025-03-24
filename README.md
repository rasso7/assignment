# Office Dogs Database

A custom WordPress theme for managing and showcasing office dogs, built with Bedrock WP boilerplate and Tailwind CSS.

## Project Overview

This WordPress application serves as a comprehensive database for office dogs, displaying their profiles, celebrating birthdays, and providing filtering options. Built with a modern development stack, it showcases canine colleagues in an engaging, user-friendly interface.

## Features

### Homepage

- Birthday celebration section highlighting dogs with birthdays in the current month
- Displays dog picture, name, favorite food, allergies, and favorite toy for birthday dogs

### Dog Directory

- Complete listing of all office dogs sorted by age
- Special featured section for the oldest dog
- Remaining dogs sorted from oldest to youngest

### Filtering System

- Filter dogs by those with allergies
- Filter by breed using a dynamic dropdown
- JavaScript/jQuery-powered filtering for smooth user experience

### Dog Profiles

- Comprehensive cards for each dog containing:
  - Name
  - Picture
  - Birth Date
  - Owner's Name
  - Favorite Food
  - Favorite Toy
  - Food Allergies
  - Breed

## Technology Stack

- **WordPress**: Content management system
- **Bedrock**: WordPress boilerplate for modern development workflows
- **Tailwind CSS**: Utility-first CSS framework for styling
- **ACF (Advanced Custom Fields)**: Used for custom meta fields and data structure
- **JavaScript/jQuery**: Powers the filtering and sorting functionality
- **Custom Post Types**: Structured data model for dog entries

## Installation

1. Clone this repository
2. Install dependencies:
   ```
   composer install
   npm install
   ```
3. Configure your environment variables (copy `.env.example` to `.env` and update)
4. Setup your local development environment (recommended: LocalWP or similar)
5. Import the ACF field configurations
6. Run `npm run build` to compile Tailwind CSS

## Usage

### Adding Dogs

1. Navigate to the WordPress admin panel
2. Go to "Dogs" in the sidebar menu
3. Click "Add New"
4. Fill in all required fields:
   - Title (Dog's Name)
   - Featured Image (Dog's Picture)
   - Birth Date
   - Owner's Name
   - Favorite Food
   - Favorite Toy
   - Food Allergies (if any)
   - Breed
5. Publish

### Customization

The theme is built with Tailwind CSS for easy styling modifications:

- Edit the `tailwind.config.js` file to adjust colors, fonts, and other design elements
- Modify the theme templates in the `/template` directory to change layouts

## Notes for Development

- No page builders (Elementor, WPBakery, etc.) are used
- Filters and sorting are implemented using vanilla JavaScript and jQuery
- Placeholder images are used until actual dog photos are available
- ACF plugin is used for all custom fields and meta data

## Screenshots

_(Add screenshots of key features here)_

## Future Enhancements

- Add birthday notification system
- Implement dog profile comparison feature
- Create printable dog ID cards
- Add dog availability calendar

## License

[MIT](LICENSE)
