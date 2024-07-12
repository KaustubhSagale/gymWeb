var optionInput = document.getElementById("optionInput");
var currentPrice = document.getElementById("currentPrice");
let newName = document.getElementById("newName");
let newFees = document.getElementById("newFees");
let updateInfo = document.getElementById("updateInfo");
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

        currentPrice.value =
          optionInput.options[optionInput.selectedIndex].getAttribute("fees");
        newName.value = optionInput.options[optionInput.selectedIndex].value;
      });
      updateInfo.addEventListener("click", function () {
        let apiUrl1 = "http://localhost/GYM_API/index.php/user/updatePrices";

        var params = {
          name: optionInput.options[optionInput.selectedIndex].value,
          newName: newName.value,
          newFees: newPrice.value,
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
      });
    }
  })
  .catch((err) => {
    console.log(err);
  });
