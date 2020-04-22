function getUsers() {
	var xhr = new XMLHttpRequest();
	xhr.open("GET", "https://reqres.in/api/users?page=" + 1, true);
	xhr.onload = function() {
		if(xhr.readyState === 4 && xhr.status === 200) {
			var objUsers = JSON.parse(xhr.responseText);
			renderUsers(objUsers);
		}
		else {
			alert("Error" + xhr.status);
		}
	}
	xhr.send();
}

// Event listener for new user button
document.getElementById("btnGetUsers").addEventListener('click', function (e) {
	// Create a XMLHttpRequest object
	var request = new XMLHttpRequest();

	// Get values from input boxes
	var firstName = document.getElementById("firstName").value;
	var lastName = document.getElementById("lastName").value;
	var email = document.getElementById("email").value;
	
	// POST request URL
	var url = "http://127.0.0.1:5000/POST/user";

	// Check if any of the fields are empty
	if(firstName != '' && lastName != '' && email != ''){

		// Open request
		request.open("POST", url);

		// Send necessary headers for JSON readability
		request.setRequestHeader("Content-Type", "application/json;charset=UTF-8");

		// Send data to Python server
		request.send(JSON.stringify({
			"firstName": firstName,
			"lastName": lastName,
			"email": email
		}));

		// Executes whenever a response has been loaded
		request.onload = function() {
			// Get data from Python server
			var data = JSON.parse(this.responseText);
			
			// Check the data status
			if(data.status == 200) {
				// User has been successfully added
				alert(data.message)
			}
			else {
				// Error
				alert("Ooops something went wrong :/");
			}
		}
	}
	else {
		// Fields are empty
		alert("Please fill the empty fields.")
	}
});



document.getElementById("btnSearchUser").addEventListener('click', function (event) {
	// Create a XMLHttpRequest object
	var request = new XMLHttpRequest();

	var id = document.getElementById("user").value;

	// Check if field is empty
	if (id != ''){
		// GET request URL
		var url = "http://127.0.0.1:5000/GET/user/"+id;

		// Open request
		request.open("GET", url);
		request.send();

		// Executes whenever a response has been loaded
		request.onload = function() {

			// Get data from Python server
			var data = JSON.parse(this.responseText);
			
			// Check the data status
			if(data.status == 200) {
				// User has been successfully added
				
				console.log(data.user)

				document.getElementById("fullName").innerHTML = "Name: "+data.user.firstName + " " + data.user.lastName
				document.getElementById("userEmail").innerHTML = "Email: "+data.user.email
			}
			else {
				// Error
				document.getElementById("fullName").innerHTML = "" + data.message
				document.getElementById("userEmail").innerHTML = ""
			}
	}
	}
	
})







function renderUsers(objUsers){
	var test = document.getElementById("test")
	var blue = 0
	for(objUser in objUsers.data){
		console.log(objUsers["data"])
		var orange = objUsers["data"]
		console.log(orange[blue]["first_name"])
		test.innerHTML += orange[blue++]["first_name"]
	}
}


