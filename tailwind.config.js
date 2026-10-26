import designTokens from './tokens.js';

/** @type {import('tailwindcss').Config} */
export default {
  mode: 'jit',
  content: [
    './*.html',
    './design-system/**/*.html',
    './components/**/*.html',
    './script.js',
    './figma.config.ts',
    './design-system/**/*.ts',
    './regenerate-icons.mjs'
  ],
  theme: {
    screens: {
      mobile: '0px',
      tablet: '768px',
      desktop: '1024px'
    },
    extend: {
      spacing: designTokens.spacing,
      colors: designTokens.colors,
      fontSize: designTokens.typography.fontSize,
      fontWeight: designTokens.typography.fontWeight,
      lineHeight: designTokens.typography.lineHeight,
      borderRadius: designTokens.borderRadius,
      keyframes: {
        'btn-ripple': {
          '0%': { transform: 'translate(-50%, -50%) scale(0)', opacity: '0.25' },
          '100%': { transform: 'translate(-50%, -50%) scale(1)', opacity: '0' }
        }
      },
      animation: {
        'btn-ripple': 'btn-ripple 600ms ease-out forwards'
      }
    }
  },
  plugins: []
};

