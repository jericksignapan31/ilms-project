function currentPass() {
    var x = document.getElementById("currentpassword");
    if (x.type === "password") {
      x.type = "text";
      document.getElementById("eye").innerHTML = '<i class="fa-solid fa-eye-slash"></i>';
    }
    else {
      x.type = "password";
      document.getElementById("eye").innerHTML = '<i class="fa-solid fa-eye"></i>';
    }
}

function newPass() {
    var x = document.getElementById("newpassword");
    if (x.type === "password") {
      x.type = "text";
      document.getElementById("eye1").innerHTML = '<i class="fa-solid fa-eye-slash"></i>';
    }
    else {
      x.type = "password";
      document.getElementById("eye1").innerHTML = '<i class="fa-solid fa-eye"></i>';
    }
}