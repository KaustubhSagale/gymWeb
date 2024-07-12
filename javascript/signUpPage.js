var nameHere = document.getElementById("name");
var mobileNumber = document.getElementById("mobileNumber");
var email = document.getElementById("email");
var subscriptionNames = document.getElementsByClassName("optionInput");
var duration = document.getElementById("duration");
var subscriptionName = document.getElementById("subscriptionName");
var startingDate = document.getElementById("startingDate");
var takeAdmissionButton = document.getElementById("takeAdmissionButton");
var subscriptionName = document.getElementById("subscriptionName");
var option = document.getElementsByTagName("option");

// Example starter JavaScript for disabling form . if there are invalid fields
(() => {
  "use strict";

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll(".needs-validation");

  // Loop over them and prevent submission
  Array.from(forms).forEach((form) => {
    form.addEventListener(
      "submit",
      (event) => {
        if (!form.checkValidity()) {
          event.preventDefault();
          event.stopPropagation();
        }

        form.classList.add("was-validated");
      },
      false
    );
  });
})();
var optionInput = document.getElementById("optionInput");
var subscriptionName;
var apiUrl = "http://localhost/GYM_API/index.php/user/getSubscription?limit=50";
var arr = [];
check = 0;
const request = new Request(apiUrl, {
  method: "GET",
});
fetch(request)
  .then((response) => response.json())
  .then((responseJson) => {
    if (responseJson.status == 200) {
      check = 1;
      //console.log("hi Data Found!");
      //  console.log(responseJson.data);
      for (var j = 0; j < responseJson.data.length; j++) {
        arr[j] = responseJson.data[j];
        console.log("data added to array");
      }
      // console.log(arr[0]);
      responseJson.data.forEach((element) => {
        let option = document.createElement("option");
        option.setAttribute("fees", element.fees);

        option.setAttribute("class", "optionsInSub");
        option.setAttribute("value", element.name);

        let optionText = document.createTextNode(element.name);
        option.appendChild(optionText);

        optionInput.appendChild(option);
      });

      optionInput.addEventListener("click", function () {
        let children = optionInput.children;
        console.log(optionInput.options[optionInput.selectedIndex].value);
        console.log(
          optionInput.options[optionInput.selectedIndex].getAttribute("fees")
        );
      });
    }
    takeAdmissionButton.addEventListener("click", function () {
      event.preventDefault();
      var apiUrl1 = "http://localhost/GYM_API/index.php/user/addCustomer";

      var params = {
        name: nameHere.value,
        mobileNumber: mobileNumber.value,
        email: email.value,
        amount:
          duration.value *
          optionInput.options[optionInput.selectedIndex].getAttribute("fees"),
        duration: duration.value,
        subscriptionName: optionInput.options[optionInput.selectedIndex].value,
        startingDate: startingDate.value,
      };

      console.log(params);
      let body = Object.keys(params)
        .map((key) => {
          return (
            encodeURIComponent(key) + "=" + encodeURIComponent(params[key])
          );
        })
        .join("&");
      const request1 = new Request(apiUrl1, {
        method: "POST",
        headers: {
          "Content-Type": "application/x-www-form-urlencoded",
        },
        body: body,
      });
      fetch(request1)
        .then((response) => response.json())
        .then((responseJson) => {
          console.log(JSON.stringify(responseJson));
          if (responseJson.status == 200) {
            alert("Successfully Admited the Gym!");
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
  })
  .catch((err) => {
    console.log(err);
  });
