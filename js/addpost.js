const clearB = document.getElementById('clear');
const title = document.getElementById('title');
const content = document.getElementById('content');
const form = document.querySelector('form');

function clear(event) {
    let confirm = window.confirm('Are you sure you want to clear the form?');
    if (confirm){
        title.value = '';
        content.value = '';
        title.style.border = 'none';
        content.style.border = 'none';
    } else {
        event.preventDefault();
    }
}

function emptyError(event) {
    if (title.value === '' && content.value === '') {
        title.style.border = '2px solid red';
        content.style.border = '2px solid red';
        event.preventDefault();
        return false;
    } else if (title.value === ""){
        title.style.border = '2px solid red';
        content.style.border = 'none';
        event.preventDefault();
        return false;
    } else if (content.value === ""){
        content.style.border = '2px solid red';
        title.style.border = 'none';
        event.preventDefault();
        return false;
    }
    else {
        title.style.border = 'none';
        content.style.border = 'none';
        return true;
    }
}

function preview() {
    let title = document.getElementById("title").value;
    let content = document.getElementById("content").value;

    let notEmpty = emptyError(event);
    if (!notEmpty) {
        return;
    }
    
    let titleNode = document.getElementById("previewTitle");
    let contentNode = document.getElementById("previewContent");

    while (titleNode.firstChild) {
        titleNode.removeChild(titleNode.firstChild);
    }
    while (contentNode.firstChild) {
        contentNode.removeChild(contentNode.firstChild);
    }

    let titleNode_text = document.createTextNode(title);
    let contentNode_text = document.createTextNode(content);

    titleNode.appendChild(titleNode_text);
    contentNode.appendChild(contentNode_text);
    
    document.getElementById("previewOverlay").style.display = "block";
}

function cancelPreview() {
    document.getElementById("previewOverlay").style.display = "none";
    document.querySelector('form').style.display = "flex";
}

function confirmSubmit() {
    document.getElementById("addBlog").submit();
}

let previewButton = document.getElementById("preview");
let cancelPreviewButton = document.getElementById("cancel");
let confirmButton = document.getElementById("confirm");

cancelPreviewButton.addEventListener('click', cancelPreview);
confirmButton.addEventListener('click', confirmSubmit);
previewButton.addEventListener('click', preview);
clearB.addEventListener('click', clear);
form.addEventListener('submit', emptyError);
