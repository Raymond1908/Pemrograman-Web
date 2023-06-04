const registerForm = document.querySelector('#register-box');
const loginForm = document.querySelector('#login-box');
const accounts = {user:"pass"};


// Perpindahan Login-Daftar
function showregisterform() {
    document.getElementById('login-form').reset();
    document.getElementById('register-form').reset();
    loginForm.classList.toggle('close');
    
    registerForm.classList.toggle('open');
    
    
}

//login
loginForm.addEventListener("submit", function(event) {
  event.preventDefault();
  const username = document.getElementById("username").value;
  const password = document.getElementById("password").value;
  if (username === "" || password === "") {
    alert("Username dan password tidak boleh kosong.");
  } else if (/*username !== "user" || password !== "pass" ||*/ password !== accounts[username]) {
    alert("Username atau password salah.");
    
  } else {
    window.location.href = "chatbubble.html";
  }
});

//fake register
registerForm.addEventListener("submit", function(event){
  event.preventDefault();
  const username = document.getElementById("usernameadd").value;
  const password = document.getElementById("passwordadd").value;
  const confirm = document.getElementById("passconfirm").value;
  if (username === "" || password === "") {
    alert("Username dan password tidak boleh kosong.");
  } else if (confirm != password) {
    alert("Password tidak sama");
  } else {
    accounts[username] = password;
    showregisterform();
    registerForm.reset();
  }
  
})





//tes tes

