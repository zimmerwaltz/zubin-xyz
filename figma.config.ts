import { Config } from '@figma/code-connect'

/**
 * Figma Code Connect Configuration
 * 
 * This file configures the mapping between Figma components and HTML/CSS code implementations.
 * Documentation: https://www.figma.com/developers/code-connect
 */

export const config: Config = {
  // Your Figma file URL - UPDATE WITH YOUR FIGMA FILE
  files: [
    'https://www.figma.com/design/asznnVeanO8MaqGgITJmLg/Executive-DS'
  ],
  
  codegen: {
    // Output directory for generated code
    outputDir: './design-system/generated',
  },
  
  // Optional: Syntax highlighting
  language: 'html',
}
