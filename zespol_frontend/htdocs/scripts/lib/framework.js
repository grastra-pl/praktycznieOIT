"use strict";

// przykładowa implementacja - nie przywiązywać się zbytnio
async function postData(url = '', data = {}) {

    const response = await fetch(url, {
        method: 'POST',
        mode: 'same-origin',
        cache: 'no-cache',
        credentials: 'same-origin',
        headers: {
            'Content-Type': 'application/json'
        },
        redirect: 'follow',
        referrerPolicy: 'no-referrer',
        body: JSON.stringify(data)
    });
    return response.json();
}

async function getData(url = '') {
    let parsedResponse;
    await fetch(url, {
        method : "GET",
    }).then(
        response => response.text()
    ).then(
        response => {
            parsedResponse = JSON.parse(response);
    });
    return parsedResponse;
}


function print(text) {
    const app = document.getElementById('app');
    app.innerHTML += `<p>${text}</p>`;
}
