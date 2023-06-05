/* logout btn */
const getStartedBtn = document.getElementById("logout-btn");

getStartedBtn.addEventListener("click", function() {
  window.location.href = "halamanlogin.php";
});


//chat
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
