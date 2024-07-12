let name1 = document.getElementById("name");
let desc1 = document.getElementById("desc1");
let desc2 = document.getElementById("desc2");
let desc3 = document.getElementById("desc3");
let desc4 = document.getElementById("desc4");
let desc5 = document.getElementById("desc5");
let desc6 = document.getElementById("desc6");
let desc7 = document.getElementById("desc7");
let desc8 = document.getElementById("desc8");
let fees = document.getElementById("fees");

let submitButton = document.getElementById("submitButton");

submitButton.addEventListener("click", function () {
  var apiUrl = "http://localhost/GYM_API/index.php/user/addSubscription";

  var params = {
    name1: name1.value,
    desc1: desc1.value,
    desc2: desc2.value,
    desc3: desc3.value,
    desc4: desc4.value,
    desc5: desc5.value,
    desc6: desc6.value,
    desc7: desc7.value,
    desc8: desc8.value,
    fees: fees.value,
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
        alert("Subscription Added!");
      } else {
        alert("Wrong Credentials");
      }
    })
    .catch((err) => {
      alert("Server is Unavialbe at this moment! Try After some time");
      console.log(err);
    });
});
