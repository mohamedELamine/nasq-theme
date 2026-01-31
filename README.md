# Nasq WordPress Theme

A professional WordPress theme for the Nasq Arabic themes and plugins marketplace.

## Features

- **Full RTL Support**: Native RTL support, not an afterthought
- **Arabic Typography**: Optimized fonts (Tajawal, Cairo) for Arabic content
- **Performance**: Clean code, fast loading, optimized for speed
- **Accessibility**: WCAG AA compliant, keyboard navigation support
- **Easy Digital Downloads Integration**: Built-in support for digital product sales
- **Customizer Ready**: Easy customization with WordPress Customizer
- **Responsive**: Mobile-first design, works on all devices
- **Translation Ready**: .pot file included for easy translation

## Theme Structure

```
nasq-theme/
├── style.css                   # Main stylesheet
├── functions.php                # Main functionality
├── front-page.php              # Front page template
├── index.php                   # Fallback template
├── 404.php                    # Error page
├── inc/                        # Theme components
│   ├── setup.php               # Theme setup
│   ├── enqueue.php             # Scripts & styles
│   ├── hooks.php               # Hooks & filters
│   └── template-tags.php       # Template functions
├── template-parts/             # Reusable parts
│   ├── header.php             # Site header
│   └── footer.php             # Site footer
├── assets/                    # Static assets
│   ├── css/
│   │   ├── rtl.css            # RTL specific styles
│   │   ├── editor.css        # Editor styles
│   │   └── admin.css          # Admin styles
│   ├── js/
│   │   ├── main.js           # Main JavaScript
│   │   └── navigation.js    # Navigation JavaScript
│   └── fonts/               # Fonts
└── languages/                 # Translation files
```

## Installation

1. Upload `nasq-theme` folder to `/wp-content/themes/`
2. Activate the theme in WordPress Admin > Appearance > Themes
3. Configure settings in Appearance > Customize
4. Install and activate Easy Digital Downloads plugin for e-commerce functionality

## Customization

### Logo
- Go to Appearance > Customize > Site Identity
- Upload your logo or use text logo

### Colors
- Colors are defined in `style.css` CSS variables
- Modify via Appearance > Customize > Colors (if customizer added)

### Fonts
- Theme uses Tajawal (Arabic) and Inter (English) from Google Fonts
- Fonts are loaded automatically via `wp_enqueue_scripts`

### RTL Support
- Theme automatically detects RTL languages
- RTL styles are loaded automatically when needed

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Opera (latest)
- Mobile browsers (iOS Safari, Chrome Mobile)

## License

GNU General Public License v2 or later

## Support

For support, visit: https://nasq.com/support

## Credits

- Theme by: Nasq Team
- Icons: WordPress Dashicons
- Fonts: Tajawal, Inter (Google Fonts)
