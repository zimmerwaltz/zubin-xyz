# Figma Code Connect Integration

This folder contains all Code Connect mappings that link Figma components to their HTML/CSS implementations.

## Overview

Code Connect allows your Figma design components to display live code examples directly in Figma. When someone views a component in Figma, they can instantly see the corresponding HTML and CSS code.

## Files

- `button.figma.tsx` - Button component mappings (Primary, Secondary)
- `typography.figma.tsx` - Typography component mappings (Display, Heading, Body)

## How It Works

1. **Figma Designer** creates or updates a component in Figma
2. **Code mapping file** defines which component maps to which code
3. **figma connect publish** updates Figma with the code
4. **In Figma**, designers click "See code" and get live examples

## Structure

```
button.figma.tsx
├── Button (Primary variant)
│   └── HTML code snippet
└── Button (Secondary variant)
    └── HTML code snippet

typography.figma.tsx
├── Display D3
│   └── HTML + CSS class
├── Heading H5
│   └── HTML + CSS class
└── Body variants
    └── HTML + CSS classes
```

## Usage

### 1. Update Component Mappings

Edit `.figma.tsx` files to match your Figma component structure:

```typescript
figma.connect(
  'ComponentName',           // Figma component name
  'https://www.figma.com/file/{FILE_KEY}/Design-System',  // Your file URL
  { variant: { type: 'Primary' } },  // Variant condition
  (node) => {
    return `<html>code</html>`  // Code to display
  }
)
```

### 2. Before Publishing

You need:
1. A Figma personal access token
2. Your Figma file key
3. npm dependencies installed

#### Get Your Credentials

**Personal Access Token:**
- Go to https://www.figma.com/developers
- Click "Create new personal access token"
- Copy the token

**File Key:**
- Open your Figma file
- URL format: `figma.com/file/{FILE_KEY}/...`
- Example: `figma.com/file/abc123XYZ/Design-System` → KEY is `abc123XYZ`

### 3. Configure Environment

```bash
# Copy example env file
cp .env.example .env

# Add your credentials to .env
FIGMA_TOKEN=your_token_here
FIGMA_FILE_KEY=your_file_key_here
```

### 4. Install Dependencies

```bash
npm install
```

### 5. Publish to Figma

```bash
# Check configuration
npm run connect:check

# Publish mappings to Figma
npm run connect:publish
```

## Common Issues

### "File not found"
- Check your FILE_KEY is correct
- Ensure you have access to the file

### "Token invalid"
- Verify FIGMA_TOKEN in .env
- Token may have expired, generate a new one

### "Component not found"
- Component name must exactly match Figma
- Check for typos and capitalization

## Advanced Usage

### Conditional Variants

Map specific variants to different code:

```typescript
{
  variant: {
    type: 'Primary',
    size: 'Large'
  }
}
```

### Dynamic Text Extraction

Get text from Figma component:

```typescript
const label = node.children[0]?.text || 'Default'
```

### Custom Properties

Access component properties:

```typescript
const theme = node.getPluginData('theme')
const disabled = node.getPluginData('disabled') === 'true'
```

## Documentation

- [Figma Code Connect Docs](https://www.figma.com/developers/code-connect)
- [API Reference](https://www.figma.com/developers/code-connect/api)
- [Config Options](https://github.com/figma/code-connect)

## Next Steps

1. ✅ Install dependencies: `npm install`
2. ✅ Set up `.env` with credentials
3. ✅ Update FILE_KEY in mapping files
4. ✅ Test with: `npm run connect:check`
5. ✅ Publish with: `npm run connect:publish`

After publishing, open your Figma file and look for the "Code" panel on components!
