// url=https://www.figma.com/design/r85wwC0Yhs3XYOqoynDYN6/Executive-DS?node-id=3065-768

import figma from "figma"

const size = figma.selectedInstance.getPropertyValue("size")
const showText = figma.selectedInstance.getPropertyValue("show text")
const showIcon = figma.selectedInstance.getPropertyValue("show icon")
const linkText = figma.selectedInstance.getPropertyValue("link text") || "Text Link"

const sizeClass = size === "medium"
  ? "text-link--medium"
  : size === "small"
    ? "text-link--small"
    : "text-link--large"

const icon = showIcon
  ? figma.code`<span class="text-link__icon icon-mask icon-plus" aria-hidden="true"></span>`
  : ""

const label = showText ? `<span>${linkText}</span>` : ""

export default {
  id: "text-link",
  example: figma.code`<a href="#" class="text-link ${sizeClass}">
  ${icon}
  ${label}
</a>`,
}
