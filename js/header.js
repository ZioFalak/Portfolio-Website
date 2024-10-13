function showSidebar() {
    const sidebar = document.querySelector('.sidebar')
    sidebar.style.display = 'flex';
    preventDefault();
}

function hideSidebar() {
    const sidebar = document.querySelector('.sidebar')
    sidebar.style.display = 'none';
    preventDefault();
}

let button = document.querySelector('.menu-btn');
let close = document.querySelector('.close');
button.addEventListener('click', showSidebar);
close.addEventListener('click', hideSidebar);
