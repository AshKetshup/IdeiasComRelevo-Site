function open_accordion(element) {
    (element.parentElement.getAttribute("open") == "true")
    ? element.parentElement.setAttribute("open", "false")
    : element.parentElement.setAttribute("open", "true")
}