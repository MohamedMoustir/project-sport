

function showEditModal() {
    
    document.getElementById("showEditModal").classList.toggle("hidden");
    document.getElementById("Cover").style.filter ="blur(4px)";

}

//  function getvalue(value){
//     if (value == "utilisateur") {
      
//         document.getElementById("matricule").style.display="none";
//         document.getElementById("Mobile").style.display="none";
//         document.getElementById("Inscription").textContent="Inscription utilisateur";
//         document.getElementById("Special").style.display="none";
//         document.getElementById("pass").value = 1;
     
//     }else{
//         document.getElementById("matricule").style.display="block";
//         document.getElementById("Mobile").style.display="block";
//         document.getElementById("Inscription").textContent="Inscription avocat";
//         document.getElementById("Special").style.display="block";
//         document.getElementById("pass").value = 0;
       
       
//     }
// }
//  document.getElementById('myForm').addEventListener('submit', function(event) {
//   var name = document.querySelector('[name="name"]').value;
//   var password = document.querySelector('[name="password"]').value;
//   var age = document.querySelector('[name="age"]').value;
//   var email = document.querySelector('[name="email"]').value;
//   var number = document.querySelector('[name="number"]').value;
//   var matricule = document.querySelector('[name="matricule"]').value;
//   var specialite = document.querySelector('[name="Specialite"]').value;

//   var emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
//   var phoneRegex = /^[+]?[0-9]{10,15}$/;
//   var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,8}$/;
//   var matriculeRegex = /^\d{6,10}$/;
//     if (!emailRegex.test(email)) {
//       event.preventDefault();
//       document.getElementById('alert-2').style.display = 'flex';
//       document.getElementById('alert').innerHTML = 'Veuillez entrer un email valide.';
      
//     }
//     if (value) {

//     if (!phoneRegex.test(number)) {   
//       event.preventDefault();
//       document.getElementById('alert-2').style.display = 'flex';
//       document.getElementById('alert').innerHTML = 'Veuillez entrer un numéro de téléphone valide.';
      
//     }
//   }
 
//     if (!passwordRegex.test(password)) {
//       event.preventDefault();
//       document.getElementById('alert-2').style.display = 'flex';
//       document.getElementById('alert').innerHTML = 'Votre mot de passe doit contenir des lettres majuscules, minuscules, des chiffres et des symboles.';
      
//     }
// if (value) {
   
//     if (!matriculeRegex.test(matricule)) {
//       event.preventDefault();
//       document.getElementById('alert-2').style.display = 'flex';
//       document.getElementById('alert').innerHTML = 'Le matricule doit être un numéro valide de 6 à 10 chiffres.';
      
//     }
//   }
// });
function hideAlert() {
  document.getElementById('alert-2').style.display = 'none';
}
