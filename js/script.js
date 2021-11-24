tableContainer.onclick = function (event) {
    if (event.target.tagName=="BUTTON" && (event.target.className!=="increment" && event.target.className!=="decrement")) {
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
        }).then(response => response.text()).then(text => showNotification(text));
        event.target.closest('tr').remove();

    }
    if (event.target.className=="increment" || event.target.className=="decrement") {
        if (event.target.className=="increment") {
            event.target.closest('td').firstElementChild.firstElementChild.innerHTML++;
        }
        if (event.target.className=="decrement") {
            event.target.closest('td').firstElementChild.firstElementChild.innerHTML--;
        }
        let id = event.target.closest('tr').id.split('-');
        id.shift();
        let target = {
            'type': event.target.className,
            'id': id.join('')
        }
        fetch('http://testtask:8080/counts.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json;charset=utf-8'
            },
            body: JSON.stringify(target)
        }).then(response => response.text()).then(text => showNotification(text));
    }
}

function showNotification(text) {
    if (document.getElementById("notification")) {
        document.getElementById("notification").remove();
    }
    let notification = document.createElement('div');
    notification.className = "notification";
    notification.id = "notification";

    notification.style.top = 10 + 'px';
    notification.style.right = 10 + 'px';

    notification.innerHTML = text;
    document.body.append(notification);

    setTimeout(() => notification.remove(), 1000);
}

