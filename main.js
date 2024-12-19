

function getvalue(value){
    if (value == "utilisateur") {
        document.getElementById("matricule").style.display="none";
        document.getElementById("Mobile").style.display="none";
        document.getElementById("Inscription").textContent="Inscription utilisateur";
        document.getElementById("Special").style.display="none";
        document.getElementById("Special").style.background="red";

       

    }else{
        document.getElementById("matricule").style.display="block";
        document.getElementById("Mobile").style.display="block";
        document.getElementById("Inscription").textContent="Inscription avocat";
        document.getElementById("Specialite").style.display="block";

    }
}

function showEditModal() {
    
    document.getElementById("showEditModal").classList.toggle("hidden");
    document.getElementById("Cover").style.filter ="blur(4px)";

}

 function getvalue(value){
    if (value == "utilisateur") {
        document.getElementById("matricule").style.display="none";
        document.getElementById("Mobile").style.display="none";
        document.getElementById("Inscription").textContent="Inscription utilisateur";
        document.getElementById("Special").style.display="none";
        document.getElementById("pass").value = 0;


    }else{
        document.getElementById("matricule").style.display="block";
        document.getElementById("Mobile").style.display="block";
        document.getElementById("Inscription").textContent="Inscription avocat";
        document.getElementById("Special").style.display="block";
        document.getElementById("pass").value = 1;
       
       
    }
}




  function validateEmail(email) {
    const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    return emailRegex.test(email);
  }

  function validatePhoneNumber(phone) {
    const phoneRegex = /^[0-9]{10}$/;
    return phoneRegex.test(phone);
  }

  
  function validateName(name) {
    const nameRegex = /^[a-zA-Z\s]+$/;
    return nameRegex.test(name);
  }

  function validateAge(age) {
    const ageRegex = /^[1-9][0-9]*$/;
    return ageRegex.test(age);
  }

  function validateForm(event) {
    const name = document.querySelector('input[name="name"]').value;
    const email = document.querySelector('input[name="email"]').value;
    const password = document.querySelector('input[name="password"]').value;
    const phoneNumber = document.querySelector('input[name="number"]').value;
    const age = document.querySelector('input[name="age"]').value;

    if (!validateName(name)) {
      document.getElementById("error").innerHTML="Invalid name. Only alphabets and spaces are allowed.";
      document.getElementById("alert-2").style.display="flex"
      event.preventDefault();
      return false;
    }

    if (!validateEmail(email)) {
      document.getElementById("error").innerHTML="Invalid email address.";
      document.getElementById("alert-2").style.display="flex"
      event.preventDefault();
      return false;
    }

    if (!validatePassword(password)) {
      document.getElementById("error").innerHTML="Password must be at least 6 characters long, contain one uppercase letter, one lowercase letter, and one number.";
      document.getElementById("alert-2").style.display="flex"
      event.preventDefault();
      return false;
    }

    if (!validatePhoneNumber(phoneNumber)) {
      document.getElementById("error").innerHTML="Invalid phone number. It must be 10 digits.";
      document.getElementById("alert-2").style.display="flex"
      event.preventDefault();
      return false;
    }

    if (!validateAge(age)) {
    document.getElementById("error").innerHTML="Invalid phone number. It must be 10 digits.";
      document.getElementById("alert-2").style.display="flex"
      event.preventDefault();
      return false;
    }

    return true; 
  }

  document.querySelector("form").addEventListener("submit", validateForm);


