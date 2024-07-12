var logInButtonInLogInPage = document.getElementById("logInButtonInLogInPage");
var Username = document.getElementById("name");
var mobileNumber = document.getElementById("mobileNumber");
var email = document.getElementById("email");
var address = document.getElementById("address");
var salary = document.getElementById("salary");
var position = document.getElementById("position");
logInButtonInLogInPage.addEventListener("click", function () {
  event.preventDefault();
  var apiUrl = "http://localhost/GYM_API/index.php/user/addStaff";

  var params = {
    name: Username.value,
    mobileNumber: mobileNumber.value,
    email: email.value,
    address: address.value,
    salary: salary.value,
    position: position.value,
  };

  // console.log("payload" + JSON.stringify(params.values));
  console.log(params);
  let body = Object.keys(params)
    .map((key) => {
      return encodeURIComponent(key) + "=" + encodeURIComponent(params[key]);
    })
    .join("&");
  const request = new Request(apiUrl, {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body: body,
  });

  fetch(request)
    .then((response) => response.json())
    .then((responseJson) => {
      console.log(JSON.stringify(responseJson));
      if (responseJson.status == 200) {
        alert("Staff Added!");
      } else {
        alert("Wrong Credentials");
      }
    })
    .catch((err) => {
      alert("Server is Unavialbe at this moment! Try After some time");
      console.log(err);
    });

  //
});
