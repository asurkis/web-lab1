const keyList = ['x', 'y', 'r'];
const inputs = {};
const markers = {};
for (const key of keyList) {
    inputs[key] = document.getElementById('input-' + key);
    markers[key] = document.getElementById('invalid-' + key);

    inputs[key].addEventListener('input', validateInputs);
}

function onInputEvent() {
    validateInputs();
}

async function validateInputs() {
    const responce = await fetch('./ajax_check.php?' + keyList.map(key => key + '=' + inputs[key].value).join('&'));
    if (responce.ok) {
        const text = await responce.text();
        for (const key of keyList) {
            markValid(key, !text.includes(key));
        }
    }
}

function markValid(key, isValid) {
    markers[key].style.visibility = isValid ? 'hidden' : 'visible';
}
