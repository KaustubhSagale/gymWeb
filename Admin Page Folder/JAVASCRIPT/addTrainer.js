var UserName = document.getElementById("name");
var mobileNumber = document.getElementById("mobileNumber");
var email = document.getElementById("email");
var address = document.getElementById("address");
var salary = document.getElementById("salary");
var info = document.getElementById("info");
var addTrainer = document.getElementById("addTrainer");
var file = document.getElementById("fileInput");

addTrainer.addEventListener("click", function () {
  console.log(file.value);
  event.preventDefault();
  var apiUrl = "http://localhost/GYM_API/index.php/user/addStaff";

  //   var params = {
  //     name: UserName.value,
  //     mobileNumber: mobileNumber.value,
  //     email: email.value,
  //     address: address.value,
  //     salary: salary.value,
  //     info: info.value,
  //     position: "Trainer",
  //   };

  //   console.log("payload" + JSON.stringify(params));

  //   console.log(params);

  //   let body = Object.keys(params)
  //     .map((key) => {
  //       return encodeURIComponent(key) + "=" + encodeURIComponent(params[key]);
  //     })
  //     .join("&");
  const formData = new FormData();
  formData.append("name", UserName.value);
  formData.append("mobileNumber", mobileNumber.value);
  formData.append("email", email.value);
  formData.append("address", address.value);
  formData.append("salary", salary.value);
  formData.append("info", info.value);
  formData.append("position", "Trainer");
  formData.append("file", file.value);
  const request = new Request(apiUrl, {
    method: "POST",
    headers: {
      "Content-Type":
        "multipart/form-data;boundary=974767299852498929531610575",
    },
    body: formData,
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
