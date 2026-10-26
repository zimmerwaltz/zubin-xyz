// url=https://www.figma.com/design/r85wwC0Yhs3XYOqoynDYN6/Executive-DS?node-id=3179-5507

import figma from "figma"

const title = figma.selectedInstance.getPropertyValue("title") || "TITLE"
const value = figma.selectedInstance.getPropertyValue("value") || "Value"

export default {
  id: "read-only",
  example: figma.code`<div class="read-only">
  <p class="read-only__title">${title}</p>
  <p class="read-only__value">${value}</p>
</div>`,
}
