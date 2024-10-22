console.log("text-count");

const textArea = document.querySelector('#textarea');
const length = document.querySelector('#count');
textArea.addEventListener('input', () => {
    var count = [...textArea.value].length;
    length.textContent = count + text;
    // length.textContent = textArea.value.length;

    if (count > maxPostLength) {
        length.style.color="red";
    }
    else {
        length.style.color="";
    }
    console.log(length.style);
}, false);

