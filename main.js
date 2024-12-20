

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

  document.getElementById('myForm').addEventListener('submit', function(event) {
    
    var name = document.querySelector('[name="name"]').value;
    var password = document.querySelector('[name="password"]').value;
    var age = document.querySelector('[name="age"]').value;
    var email = document.querySelector('[name="email"]').value;
    var number = document.querySelector('[name="number"]').value;
    var matricule = document.querySelector('[name="matricule"]').value;
    var specialite = document.querySelector('[name="Specialite"]').value;
    
   
    if (!name || !password || !age || !email || !number || !matricule || !specialite) {
      alert("Veuillez remplir tous les champs requis.");
      event.preventDefault();
    } else {
   
      var emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
      if (!emailRegex.test(email)) {
        alert("Veuillez entrer un email valide.");
        event.preventDefault(); 
      }
    }
  });

