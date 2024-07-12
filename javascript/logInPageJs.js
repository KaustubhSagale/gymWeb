var logInButtonInLogInPage = document.getElementById("logInButtonInLogInPage");
var body = document.body;

/*logInButtonInLogInPage.addEventListener("click", function (event) {
  event.preventDefault(); // Prevent form submission behavior
  window.location.href = "Admin Page Folder/adminPageGym.html";
});*/

let edtPassword = document.getElementById("password");

let edtUsername = document.getElementById("username");

logInButtonInLogInPage.addEventListener("click", function () {
  event.preventDefault();
  var apiUrl = "http://localhost/GYM_API/index.php/user/signin";

  console.log(edtUsername.value);
  var params = {
    username: edtUsername.value,
    password: edtPassword.value,
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
        window.location.href = "Admin Page Folder/adminPageGym.html";
      } else {
        alert("Wrong Credentials");
      }
    })
    .catch((err) => {
      alert("Server is Unavaiable at this Moment!Try after some time");
      console.log(err);
    });

  //
});
