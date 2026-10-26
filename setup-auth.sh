#!/bin/bash

# Figma Code Connect Authentication Setup
# 
# This script helps you set up authentication for Figma Code Connect.
# Run this before publishing components to Figma.

echo "🔐 Figma Code Connect Authentication Setup"
echo "=========================================="
echo ""
echo "1. Go to: https://www.figma.com/developers"
echo "2. Click on 'Create Personal Access Token'"
echo "3. Name it: 'zubin-code-connect'"
echo "4. Paste the token below (or set FIGMA_TOKEN in your .env file)"
echo ""

# Check if .env file exists
if [ -f .env ]; then
    echo "✅ .env file already exists"
    if grep -q "FIGMA_TOKEN" .env; then
        echo "✅ FIGMA_TOKEN is set"
    else
        echo "⚠️  FIGMA_TOKEN not found in .env"
    fi
else
    echo "Creating .env file from template..."
    cp .env.example .env
    echo "✅ Created .env file - add your FIGMA_TOKEN"
fi

echo ""
echo "To authenticate, run:"
echo "  export FIGMA_TOKEN='your-token-here'"
echo "  figma connect publish"
