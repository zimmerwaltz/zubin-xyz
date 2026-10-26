# ✅ Figma Code Connect Setup Complete

Your design system now has full Figma Code Connect integration installed and configured.

## What Was Set Up

### 1. **Project Infrastructure** ✅
- **package.json** - Manages dependencies with npm scripts
- **figma.config.ts** - Central configuration for Code Connect
- **.env / .env.example** - Credential management
- **.gitignore** - Security (prevents committing secrets)

### 2. **Installed Packages** ✅
- **@figma/code-connect** v1.4.2 - Links Figma to code
- **style-dictionary** v3.9.2 - Generates design tokens

### 3. **Component Mappings** ✅
- **button.figma.tsx** - Button component variants
- **typography.figma.tsx** - Typography scales
- Extensible structure for adding more components

### 4. **Documentation** ✅
- **FIGMA_CODE_CONNECT_SETUP.md** - Complete step-by-step guide
- **FIGMA_CODE_CONNECT_QUICK_START.md** - 5-minute quick reference
- **design-system/code-connect/README.md** - Component mapping guide

## System Structure

```
zubin-xyz/
├── 📦 package.json                           (Installed ✅)
├── 🔧 figma.config.ts                        (Configuration)
├── 📄 .env.example                           (Template)
├── .gitignore                                (Security)
├── 🚀 FIGMA_CODE_CONNECT_SETUP.md            (Detailed guide)
├── ⚡ FIGMA_CODE_CONNECT_QUICK_START.md      (Quick reference)
├── node_modules/                            (Installed ✅)
├── design-system/
│   ├── tokens.json                          (Design tokens)
│   ├── index.html                           (Showcase page)
│   ├── components/                          (Components library)
│   └── code-connect/                        (Figma mappings)
│       ├── README.md                        (Guide)
│       ├── button.figma.tsx                 (Button mapping)
│       └── typography.figma.tsx             (Typography mapping)
└── [other project files]
```

## Installation Status

| Component | Status | Details |
|-----------|--------|---------|
| npm packages | ✅ Installed | @figma/code-connect@1.4.2, style-dictionary@3.9.2 |
| Configuration | ✅ Ready | figma.config.ts (.env template in place) |
| Component mappings | ✅ Ready | Button & Typography examples provided |
| Design tokens | ✅ Ready | tokens.json with full system |
| Design showcase | ✅ Ready | design-system/index.html |
| Documentation | ✅ Complete | Setup guides + quick start |
| .gitignore | ✅ Added | Protects .env from git commits |

## Next: 4-Step Configuration

### Step 1: Get Figma Credentials (2 min)

1. Visit: https://www.figma.com/developers
2. Click "Create new personal access token"
3. Name: `zubin-code-connect`
4. Copy the token (save securely)

Get your Figma file key from URL:
- Example: `figma.com/file/abc123XYZ/Design-System`
- Key: `abc123XYZ`

### Step 2: Configure Environment (1 min)

```bash
# Copy template
cp .env.example .env

# Edit .env file and add:
FIGMA_TOKEN=your_token_here
FIGMA_FILE_KEY=your_file_key_here
```

**🔒 IMPORTANT:** .env is in .gitignore - Your credentials won't be committed

### Step 3: Update Configuration (1 min)

Edit `figma.config.ts`:
```typescript
files: [
  'https://www.figma.com/file/YOUR_FILE_KEY/Your-Design-System-Name'
]
```

### Step 4: Verify & Publish (1 min)

```bash
# Test configuration
npm run connect:check

# Publish to Figma
npm run connect:publish
```

**Total time: ~5 minutes**

## Available Commands

```bash
# Validate configuration
npm run connect:check

# Publish components to Figma
npm run connect:publish

# Build design tokens (coming soon)
npm run tokens:build

# View all scripts
npm run
```

## After Publishing

When you run `npm run connect:publish`:

1. ✅ Your Figma components get linked to code
2. ✅ Code panels appear in Figma's inspector
3. ✅ Designers see HTML/CSS snippets
4. ✅ Team can copy code directly from Figma

### In Figma:
1. Open your design system file
2. Select a component (e.g., Button)
3. Look for "Code" tab in right panel
4. See linked HTML/CSS
5. Copy code as needed

## Component Mapping Quick Reference

### Button Example
Map button variants to HTML:
```typescript
figma.connect(
  'Button',
  'https://www.figma.com/file/KEY/Design-System',
  { variant: { type: 'Primary' } },
  (node) => `
    <a href="#" class="btn btn-primary">
      <span>Label</span>
      <span class="btn-icon icon-mask icon-arrow-right" aria-hidden="true"></span>
    </a>
  `
)
```

### Adding New Components

1. Create: `design-system/code-connect/component-name.figma.tsx`
2. Copy pattern from button or typography
3. Match Figma component names exactly
4. Update HTML/CSS code
5. Run `npm run connect:publish`

## Troubleshooting

| Problem | Solution |
|---------|----------|
| **"Token invalid"** | Check FIGMA_TOKEN in .env, may need new token |
| **"File not found"** | Verify FIGMA_FILE_KEY is correct and you have access |
| **"Component not found"** | Component name in .figma.tsx must match Figma exactly (case-sensitive) |
| **"Connection failed"** | Ensure .env variables are set and valid |
| **Node version warning** | Node v18+ recommended but v16+ works (warnings are OK) |

## Documentation Links

- 📘 [Complete Setup Guide](./FIGMA_CODE_CONNECT_SETUP.md) - Step-by-step instructions
- ⚡ [Quick Start](./FIGMA_CODE_CONNECT_QUICK_START.md) - Fast reference
- 🏗️ [Component Mapping Guide](./design-system/code-connect/README.md) - How to map components
- 🎨 [Design System Overview](./design-system/README.md) - Full design system docs

## Project Files

**Configuration:**
- `figma.config.ts` - Main Code Connect config
- `package.json` - Dependencies & scripts
- `.env.example` - Credentials template
- `.gitignore` - Git security settings

**Code Connect:**
- `design-system/code-connect/button.figma.tsx` - Button mappings
- `design-system/code-connect/typography.figma.tsx` - Typography mappings
- `design-system/code-connect/README.md` - Mapping guide

**Helper Scripts:**
- `setup-auth.sh` - Authentication setup helper

## Environment Variables

```bash
# Required for publishing
FIGMA_TOKEN=                # Your personal access token
FIGMA_FILE_KEY=             # Your Figma file ID

# Optional
# FIGMA_TEAM_ID=            # For team files
# GITHUB_TOKEN=             # For CI/CD integration
```

## Recommended Workflow

1. **Design in Figma** → Create/update components
2. **Code mapping** → .figma.tsx files
3. **Test locally** → `npm run connect:check`
4. **Publish** → `npm run connect:publish`
5. **Share with team** → Designers view code in Figma

## What's Included in Code Sync

✅ Component names and variants  
✅ HTML structure  
✅ CSS classes  
✅ SVG icons  
✅ Links to component files  
✅ Dynamic text extraction  

## Security Best Practices

- ✅ Never commit `.env` to git (in .gitignore)
- ✅ Keep FIGMA_TOKEN secret
- ✅ Use environment variables in CI/CD
- ✅ Rotate tokens periodically
- ✅ Don't share .env files

## Next Actions

1. **📋 Read:** [FIGMA_CODE_CONNECT_QUICK_START.md](./FIGMA_CODE_CONNECT_QUICK_START.md)
2. **🔐 Setup:** Create .env with credentials
3. **⚙️ Configure:** Update figma.config.ts with your Figma file URL
4. **✅ Test:** Run `npm run connect:check`
5. **🚀 Publish:** Run `npm run connect:publish`
6. **👀 Verify:** Check Figma for "Code" panels on components

---

**Version:** 1.0  
**Setup Date:** March 29, 2026  
**Status:** Ready for Configuration  
**Next Step:** Follow [Quick Start Guide](./FIGMA_CODE_CONNECT_QUICK_START.md)
