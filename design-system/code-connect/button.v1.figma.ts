import figma, { html } from '@figma/code-connect/html'

figma.connect(
  'https://www.figma.com/design/asznnVeanO8MaqGgITJmLg/Executive-DS?node-id=26-403',
  {
    variant: { type: 'primary' },
    example: () => html`
      <a href="#" class="btn btn-primary">
        <span class="btn-icon icon-mask icon-plus" aria-hidden="true"></span>
        <span>Button</span>
        <span class="btn-icon icon-mask icon-plus" aria-hidden="true"></span>
      </a>
    `,
  },
)

figma.connect(
  'https://www.figma.com/design/asznnVeanO8MaqGgITJmLg/Executive-DS?node-id=26-403',
  {
    variant: { type: 'outline' },
    example: () => html`
      <a href="#" class="btn btn-outline">
        <span class="btn-icon icon-mask icon-plus" aria-hidden="true"></span>
        <span>Button</span>
        <span class="btn-icon icon-mask icon-plus" aria-hidden="true"></span>
      </a>
    `,
  },
)