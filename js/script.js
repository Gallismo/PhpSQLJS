tableContainer.onclick = function (event) {
    let lastElement;
    if (event.target.tagName=="BUTTON") {
        event.target.closest('tr').remove();
    }
}