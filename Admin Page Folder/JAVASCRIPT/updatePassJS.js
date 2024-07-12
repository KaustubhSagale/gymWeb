var SubmitButton = document.getElementById("SubmitButton");
var username = document.getElementById("username");
var oldPass = document.getElementById("oldPassEle");
var newPass = document.getElementById("newPassEle");
SubmitButton.addEventListener("click", function () {
  event.preventDefault();
  var apiUrl = "http://localhost/GYM_API/index.php/user/signin";

  var params = {
    username: username.value,
    password: oldPass.value,
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
        var apiUrl = "http://localhost/GYM_API/index.php/user/updatePass";

        // console.log(edtUsername.value);
        var params = {
          newPass: newPass.value,
          oldPass: oldPass.value,
        };

        // console.log("payload" + JSON.stringify(params.values));
        console.log(params);
        let body = Object.keys(params)
          .map((key) => {
            return (
              encodeURIComponent(key) + "=" + encodeURIComponent(params[key])
            );
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
              alert("Updated the Info!");
            } else {
              alert("something Wrong happened!");
            }
          })
          .catch((err) => {
            console.log(err);
          });
      } else {
        alert("Wrong Old Username or Password!");
      }
    })
    .catch((err) => {
      alert("Server is Unavaiable at this Moment!Try after some time");
      console.log(err);
    });

  //
});
