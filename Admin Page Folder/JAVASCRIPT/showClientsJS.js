var body = document.body;
var table = document.getElementById("tableInShow");
var apiUrl =
  "http://localhost/GYM_API/index.php/user/getUsersForClients?limit=100";
const request = new Request(apiUrl, {
  method: "GET",
});
fetch(request)
  .then((response) => response.json())
  .then((responseJson) => {
    console.log(JSON.stringify(responseJson));
    if (responseJson.status == 200) {
      console.log("hi Data Found!");
      let tableInShow = document.getElementById("tableInShow");
      var html;
      var i = 0;

      html =
        "<tr><th>Sr.No</th><th>Name</th><th>Email</th><th>Mobile Number</th><th>Subscription</th><th>Duration</th><th>Amount Paid</th>";
      responseJson.data.forEach((element) => {
        let trHtml = "<tr>";
        trHtml += "<td>" + (i + 1) + "</td>";

        trHtml += "<td>" + element.name + "</td>";
        trHtml += "<td>" + element.email + "</td>";
        trHtml += "<td>" + element.mobileNumber + "</td>";
        trHtml += "<td>" + element.subscriptionName + "</td>";
        trHtml += "<td>" + element.duration + "</td>";
        trHtml += "<td>" + element.amount + "</td>";
        trHtml += "</tr>";
        html += trHtml;
        i++;
      });
      tableInShow.innerHTML = html;
    } else {
      alert("Server Is Not Available");
    }
  })
  .catch((err) => {
    alert("Server Is Not Available at this Movement!Try After some time");
    console.log(err);
  });

//
