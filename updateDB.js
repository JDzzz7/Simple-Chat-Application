window.addEventListener("DOMContentLoaded", function () {
	document.querySelector("#chat").addEventListener("keyup", function () {
 
	   	// Get values from textboxes
	   	let name = document.querySelector("#name")
	   	let password = document.querySelector("#password")
	   	let chatbox = document.querySelector("#chat")

		if (name, password, chatbox) {
			name = name.value;
			password = password.value;
			chatbox = chatbox.value;
			//console.log(name, password, chatbox)
			checkUpdate(name, password, chatbox);
		}
	   	   
	});
 });

 window.addEventListener("DOMContentLoaded", function () {
	document.querySelector("#submit").addEventListener("click", function () {
 
		let validName = document.querySelector("#validName")
		
		if (validName){
			validName = validName.value;
			checkRetrieve(validName);
		}
	   		   
	});
 });

 function checkUpdate(name, password, chatbox) {
	// TODO: Modify to use XMLHttpRequest
	let xhr = new XMLHttpRequest();
	xhr.addEventListener("load", responseReceivedHandlerA);
    xhr.open("GET", "checkUpdate.php?name=" + name + "&password=" + password + "&chatbox=" + chatbox, true);
    xhr.send();
 }

 function checkRetrieve(validName) {
	// TODO: Modify to use XMLHttpRequest
	let xhr = new XMLHttpRequest();
	xhr.addEventListener("load", responseReceivedHandlerB);
    xhr.open("GET", "checkRetrieve.php?validName=" + validName);
    xhr.send();
 }

 function responseReceivedHandlerA() {
	if (this.responseText){
		let html = "";
		html += `${this.responseText}`
		document.querySelector("#result").innerHTML = html;
	}
	else {
		let html = "";
		html += `${this.responseText}`
		document.querySelector("#result").innerHTML = html;
	}
 }

 function responseReceivedHandlerB() {
	if (this.responseText){
		let html = "";
		html += `${this.responseText}`
		document.querySelector("#chatReply").innerHTML = html;
	}
	else {
		let html = "";
		html += `${this.responseText}`
		document.querySelector("#chatReply").innerHTML = html;
	}
 }
 

 