function close_close_btn() {
    const confirmation_class = document.querySelector('.confirmation_class')
    confirmation_class.style.display = 'none'
}

function hideBorrowDiv() {
    const div_col1 = document.querySelector('.col-1');
    div_col1.style.display = 'none'
    const div_col2 = document.querySelector('.col-2');
    div_col2.style.display = 'block'

    const buttonShowReserve = document.querySelector('.reserveBtn');
    buttonShowReserve.style.backgroundColor = "rgba(34, 55, 162)";
    buttonShowReserve.style.color = "#fff";

    const buttonShowBorrow = document.querySelector('.borrow');
    buttonShowBorrow.style.backgroundColor = "#fff";
    buttonShowBorrow.style.color = "black";
}

function hideReserveDiv() {
    const div_col1 = document.querySelector('.col-1');
    div_col1.style.display = 'block'
    const div_col2 = document.querySelector('.col-2');
    div_col2.style.display = 'none'

    const buttonShowReserve = document.querySelector('.reserveBtn');
    buttonShowReserve.style.backgroundColor = "#fff";
    buttonShowReserve.style.color = "black";

    const buttonShowBorrow = document.querySelector('.borrow');
    buttonShowBorrow.style.backgroundColor = "rgba(34, 55, 162)";
    buttonShowBorrow.style.color = "#fff";
}

function showHideNavigation() {
    
    const div_col1 = document.querySelector('.notification_class');

    // Check the current display style and toggle it
    if (div_col1.style.display === 'block') {
        div_col1.style.display = 'none'; // Hide the element
    } else {
        div_col1.style.display = 'block'; // Show the element
    }
}
function mobile_nav(){
    const mobile_side = document.querySelector('.mobile_side');

    // Check the current display style and toggle it
    if (mobile_side.style.display === 'block') {
        mobile_side.style.display = 'none'; // Hide the element
    } else {
        mobile_side.style.display = 'block'; // Show the element
    }
}
function close_error_btn() {
    const error_class = document.querySelector('.error_class')
    error_class.style.display = 'none'
}