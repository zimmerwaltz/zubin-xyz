// url=https://www.figma.com/design/r85wwC0Yhs3XYOqoynDYN6/Executive-DS?node-id=26-403

import figma from "figma"

// Branch per variant; no default, else first.

let template
if (figma.selectedInstance.getPropertyValue("type") === "primary") {
  template = {
    id: "button-primary",
    example: figma.code`
      <a href="#" class="btn btn-primary">
        <span class="btn-icon icon-mask icon-plus" aria-hidden="true"></span>
        <span>Button</span>
        <span class="btn-icon icon-mask icon-plus" aria-hidden="true"></span>
      </a>
    `,
  }
} else if (figma.selectedInstance.getPropertyValue("type") === "outline") {
  template = {
    id: "button-outline",
    example: figma.code`
      <a href="#" class="btn btn-outline">
        <span class="btn-icon icon-mask icon-plus" aria-hidden="true"></span>
        <span>Button</span>
        <span class="btn-icon icon-mask icon-plus" aria-hidden="true"></span>
      </a>
    `,
  }
} 

export default template
