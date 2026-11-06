# Changelog

## [1.0.0] — 22 October 2026

**Initial public release** 🚀

### Added

- Personal portfolio website with responsive layouts.
- Project and case-study showcases:
  - Brewing a Better Retail Experience for Coffee Lovers
  - Driving Smarter, Evidence-Based Healthcare Decisions
  - Elevating the Retail Shopping Experience
  - Envisioning a Seamless Streaming Experience
  - Streamlining Service Operations for Field Engineers
  - The Digital Runway to India's Youngest Airline
- Design system with reusable components and design tokens.
- Animations, microinteractions, and page transitions.
- Navigation across portfolio and case-study pages.
- Basic SEO and search-engine discovery configuration, including `robots.txt` and a sitemap.

### Technical

- PHP-based reusable page architecture with HTML, CSS, and vanilla JavaScript.
- Tailwind CSS and npm tooling for development and asset builds.
- Barba.js for page transitions.
- Figma Code Connect and Style Dictionary integration for design-system workflows.

### Known Bugs
- Some mobile image sections currently scroll vertically; they need to be optimized for horizontal scrolling to reduce overall page length.
- Google search console has been updated with the latest sitemap file but it still shows a "Couldn't fetch" error.


### Bugs Fixed
- Lazy-loading behavior does not work as intended in all cases and needs further work.
- Show max of 3 testimonials on mobile.
- Right align the "Back to Top" arrow with the copyright text.
- Make the first hero section visible on the first scroll.
- Video loading failure fixed on field service agent case study page.


### Possible Upgrades
- Add Spofity playlist and show soundwaves at the top while its playing.
- Add the rest of the sections like photography and graphic design.
- Update google search results text through meta description update on the index.php page
- Update testimonials to show one at a time and a cirlce showing initials of the person with a circluar timeout outline around it which completes and moves to the next testimonial. 

### Upgrades Completed
- Add mini youtube like chapters so that the user can directly scroll to that section. 
- Add subtle vignette to the bottom of the viewport.
- Home Product Design images layout optimised for tablet and mobile.
