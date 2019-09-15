const keyList = ['x', 'y', 'r'];
const inputs = {};
const markers = {};

for (const key of keyList) {
    inputs[key] = document.getElementById('input-' + key);
    markers[key] = document.getElementById('invalid-' + key);

    inputs[key].addEventListener('input', validateInputs);
}

async function validateInputs() {
    const responce = await fetch('./ajax_check.php?' + keyList.map(key => key + '=' + inputs[key].value).join('&'));
    if (responce.ok) {
        const text = await responce.text();
        let allValid = true;
        for (const key of keyList) {
            const isValid = !text.includes(key);
            markValid(key, isValid);
            allValid &= isValid;
        }
        document.querySelector('input[type="submit"]').disabled = !allValid;
    }
}

function markValid(key, isValid) {
    markers[key].style.visibility = isValid ? 'hidden' : 'visible';
}
