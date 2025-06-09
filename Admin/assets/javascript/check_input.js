function check_sem_input(){ 
    let sy = document.Form["Form_semister"]["sy"].value;
    if(sy == ""){
        document.getElementById("warning-term").innerHTML = "Please input school year.";
        return false;
    }
}

function checkAddMembers(){
    const Student_ID = document.getElementById('Student_ID');
    const Fname = document.getElementById('Fname');
    const Lname = document.getElementById('Lname');
    const Birthdate = document.getElementById('Birthdate');
    const Email = document.getElementById('Email');
    const Contact_Number = document.getElementById('Contact_Number');
    const Year = document.getElementById('Year');
    const Course = document.getElementById('Course');
    const Section = document.getElementById('Section');

    const Errors = document.getElementById('Errors');

    let isValid = true;

    if (Student_ID.value.trim() === '') {
        Errors.textContent = 'Student ID is required!.';
        isValid = false;
    }
    else if (Fname.value.trim() === ''){
        Errors.textContent = 'Fname is required!.';
        isValid = false;
    }
    else if (Lname.value.trim() === ''){
        Errors.textContent = 'Lname is required!.';
        isValid = false;
    }
    else if (Birthdate.value.trim() === ''){
        Errors.textContent = 'Birthdate is required!.';
        isValid = false;
    }
    else if (Email.value.trim() === ''){
        Errors.textContent = 'Email is required!.';
        isValid = false;
    }
    else if (Contact_Number.value.trim() === ''){
        Errors.textContent = 'Contact Number is required!.';
        isValid = false;
    }
    else if (Year.value.trim() === ''){
        Errors.textContent = 'Year level is required!.';
        isValid = false;
    }
    else if (Course.value.trim() === ''){
        Errors.textContent = 'Course is required!.';
        isValid = false;
    }
    else if (Section.value.trim() === ''){
        Errors.textContent = 'Section is required!.';
        isValid = false;
    }

    return isValid;
}

function checkAddBooks(){
    const AccessionNumber = document.getElementById('AccessionNumber');
    const Title = document.getElementById('Title');

    const Errors = document.getElementById('Errors');

    let isValid = true;

    if (AccessionNumber.value.trim() === '') {
        Errors.textContent = 'Accession number is required!.';
        isValid = false;
    }
    else if (Title.value.trim() === ''){
        Errors.textContent = 'Title is required!.';
        isValid = false;
    }


    return isValid;
}