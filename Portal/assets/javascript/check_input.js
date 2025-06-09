function checkStudentInfo(){
    const lname = document.getElementById('lname');
    const fname = document.getElementById('fname');
    const address = document.getElementById('address');
    const contact_Number = document.getElementById('contact_Number');
    const course = document.getElementById('course');
    const year = document.getElementById('year');
    const section = document.getElementById('section');
    const birthdate = document.getElementById('birthdate');
    const email = document.getElementById('email');
    const password = document.getElementById('password');

    const Errors = document.getElementById('Errors');

    let isValid = true;

    if (lname.value.trim() === '') {
        Errors.textContent = 'Last name is required required!.';
        isValid = false;
    }

    if (fname.value.trim() === '') {
        Errors.textContent = 'First name is required required!.';
        isValid = false;
    }

    if (address.value.trim() === '') {
        Errors.textContent = 'Address is required required!.';
        isValid = false;
    }

    if (contact_Number.value.trim() === '') {
        Errors.textContent = 'Contact number is required required!.';
        isValid = false;
    }

    if (course.value.trim() === '') {
        Errors.textContent = 'Course is required required!.';
        isValid = false;
    }

    if (year.value.trim() === '') {
        Errors.textContent = 'Year is required required!.';
        isValid = false;
    }

    if (section.value.trim() === '') {
        Errors.textContent = 'Section is required required!.';
        isValid = false;
    }

    if (birthdate.value.trim() === '') {
        Errors.textContent = 'Birthday is required required!.';
        isValid = false;
    }

    if (email.value.trim() === '') {
        Errors.textContent = 'Email is required required!.';
        isValid = false;
    }

    if (password.value.trim() === '') {
        Errors.textContent = 'Password is required required!.';
        isValid = false;
    }
    return isValid;
}