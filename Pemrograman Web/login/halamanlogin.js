
//login
const form = document.querySelector("form");

/*
form.addEventListener("submit", function(event) {
  event.preventDefault();
  const username = document.getElementById("username").value;
  const password = document.getElementById("password").value;
  if (username === "" || password === "") {
    alert("Username dan password tidak boleh kosong.");
  } else if (username !== "user" || password !== "pass") {
    alert("Username atau passwordsldjfkl salah.");
  } else {
    window.location.href = "chatbubble.html";
  }
});
*/

// Perpindahan Login-Daftar
const registerForm = document.querySelector('#register-form');
const loginForm = document.querySelector('#login-form');

function showregisterform() {
    loginForm.classList.toggle('close');
    
    
    registerForm.classList.toggle('open');
    
}
