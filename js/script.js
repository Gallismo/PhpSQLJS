tableContainer.onclick = function (event) {
    if (event.target.tagName=="BUTTON" && (!event.target.id=="increment" && !event.target.id=="decrement")) {
        let id = event.target.closest('tr').id.split('-');
        id.shift();
        let target = {
            'id': id.join('')
        }
        fetch('http://testtask:8080/invisible.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json;charset=utf-8'
            },
            body: JSON.stringify(target)
        });
        event.target.closest('tr').remove();

    }
    if (event.target.id=="increment" || event.target.id=="decrement") {
        if (event.target.id=="increment") {
            event.target.closest('td').firstElementChild.innerHTML++;
        }
        if (event.target.id=="decrement") {
            event.target.closest('td').firstElementChild.innerHTML--;
        }
        let id = event.target.closest('tr').id.split('-');
        id.shift();
        let target = {
            'type': event.target.id,
            'id': id.join('')
        }
        fetch('http://testtask:8080/counts.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json;charset=utf-8'
            },
            body: JSON.stringify(target)
        });
    }
}

