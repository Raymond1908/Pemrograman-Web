/* logout btn */
const getStartedBtn = document.getElementById("logout-btn");

getStartedBtn.addEventListener("click", function() {
  window.location.href = "halamanlogin.php";
  alert("Anda berhasil logout");
});


//chat
/*
var list = document.querySelector('.chat-box');

function chating() {
    var uchat = document.getElementById('yourchat').value;
    var entry = document.createElement('p');
    var you = document.createElement('strong');
    you.appendChild(document.createTextNode("You: "));
    entry.appendChild(you)
    entry.appendChild(document.createTextNode(uchat));
    
    list.appendChild(entry);
    uchat.value= '';
}
*/

//Ganti PP
function showUploadPopup() {
  document.getElementById('uploadPopup').style.display = 'block';
}

function hideUploadPopup() {
  document.getElementById('uploadPopup').style.display = 'none';
}


