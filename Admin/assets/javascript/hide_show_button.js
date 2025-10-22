function hide_show_sub_nav_book(){
    const content = document.getElementById('sub-dropdown');
    if (content.style.display === 'none' || content.style.display === '') {
        content.style.display = 'block';
        content.classList.add('active');
    } else {
        content.style.display = 'none';
        content.classList.remove('active');
    }
}

function hide_show_sub_nav_trans(){
    const content = document.getElementById('sub-dropdown-trans');
    if (content.style.display === 'none' || content.style.display === '') {
        content.style.display = 'block';
        content.classList.add('active');
    } else {
        content.style.display = 'none';
        content.classList.remove('active');
    }
}

function hide_show_sub_nav_book_members(){
    const toggleButton = document.getElementById('toggleButton');
    const content = document.getElementById('sub-dropdown-members');

    if (content.style.display === 'none' || content.style.display === '') {
        content.style.display = 'block';
        toggleButton.textContent = 'Hide';
    } else {
        content.style.display = 'none';
            toggleButton.textContent = 'Show';
    }
}
function hide_show_sub_nav_book_inventory(){
    const toggleButton = document.getElementById('toggleButton');
    const content = document.getElementById('sub-dropdown-management');

    if (content.style.display === 'none' || content.style.display === '') {
        content.style.display = 'block';
        toggleButton.textContent = 'Hide';
    } else {
        content.style.display = 'none';
            toggleButton.textContent = 'Show';
    }
}

function hide_show_sub_nav_book_management(){
    const toggleButton = document.getElementById('toggleButton');
    const content = document.getElementById('sub-dropdown-management-1');

    if (content.style.display === 'none' || content.style.display === '') {
        content.style.display = 'block';
        toggleButton.textContent = 'Hide';
    } else {
        content.style.display = 'none';
            toggleButton.textContent = 'Show';
    }
}

function hide_show_sub_nav_book_transaction(){
    const toggleButton = document.getElementById('toggleButton');
    const content = document.getElementById('sub-dropdown-transaction');

    if (content.style.display === 'none' || content.style.display === '') {
        content.style.display = 'block';
        toggleButton.textContent = 'Hide';
    } else {
        content.style.display = 'none';
            toggleButton.textContent = 'Show';
    }
}

function close_close_btn() {
    const confirmation_class = document.querySelector('.confirmation_class')
    confirmation_class.style.display = 'none'
}


function open_qr_btn() {
    const qr_class = document.querySelector('.qr_class')
    qr_class.style.display = 'flex'
    
    const confirmation_class = document.querySelector('.confirmation_class')
    confirmation_class.style.display = 'none'
}

function close_qr_btn() {
    const qr_class = document.querySelector('.qr_class')
    qr_class.style.display = 'none'

}
