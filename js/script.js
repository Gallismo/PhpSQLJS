tableContainer.onclick = function (event) {
    let lastElement;
    if (event.target.tagName=="BUTTON") {
        let id = event.target.closest('tr').id.split('-');
        id.shift();
        let target = {
            'id': id.join('')
        }
        fetch('http://testtask:8080/api.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json;charset=utf-8'
            },
            body: JSON.stringify(target)
        });
        event.target.closest('tr').remove();

    }
}