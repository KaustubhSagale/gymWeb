let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides((slideIndex += n));
}

function currentSlide(n) {
  showSlides((slideIndex = n));
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");

  let dots = document.getElementsByClassName("dot");
  if (n > slides.length) {
    slideIndex = 1;
  }
  if (n < 1) {
    slideIndex = slides.length;
  }
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex - 1].style.display = "block";
  dots[slideIndex - 1].className += " active";
}

let slideIndex1 = 1;
showSlides1(slideIndex1);

function plusSlides1(n) {
  showSlides1((slideIndex1 += n));
}

function currentSlide1(n) {
  showSlides1((slideIndex1 = n));
}

function showSlides1(n) {
  let i;

  let slide = document.getElementsByClassName("slides");
  let dot = document.getElementsByClassName("dot");
  if (n > slide.length) {
    slideIndex1 = 1;
  }
  if (n < 1) {
    slideIndex1 = slide.length;
  }
  for (i = 0; i < slide.length; i++) {
    slide[i].style.display = "none";
  }
  for (i = 0; i < dot.length; i++) {
    dot[i].className = dot[i].className.replace(" active", "");
  }
  slide[slideIndex1 - 1].style.display = "block";
  dot[slideIndex1 - 1].className += " active";
}

var GoToLogInPage = document.getElementById("GoToLogInPage");

GoToLogInPage.addEventListener("click", function () {
  var price = document.getElementById("price");
  price.scrollIntoView();
});

//var optionInput = document.getElementById("optionInput");

var apiUrl = "http://localhost/GYM_API/index.php/user/getSubscription?limit=50";
const request = new Request(apiUrl, {
  method: "GET",
});
fetch(request)
  .then((response) => response.json())
  .then((responseJson) => {
    if (responseJson.status == 200) {
      let cardsInPricing = document.getElementById("cardsPricing");
      console.log("hi Data Found!");

      const arr = [];
      for (var j = 0; j < responseJson.data.length; j++) {
        arr[j] = responseJson.data[j];
      }

      for (var i = 0; i < j; i++) {
        let cardNew = document.createElement("div");
        cardNew.setAttribute("class", "card");

        let option = document.createElement("h3");
        let list = document.createElement("ul");
        var li = document.createElement("li");
        let button = document.createElement("button");

        button.setAttribute("class", "btn");
        cardNew.setAttribute("class", "card");
        let optionText = document.createTextNode(arr[i].name);
        option.appendChild(optionText);
        cardNew.appendChild(option);
        /* let attributeInArray = [];
        for (let m = 0; m < 8; m++) {
          attributeInArray[m] = arr[i][j];
          console.log(attributeInArray[i][j]);
        }*/

        for (var l = 0; l < 8; l++) {
          var base = `desc${l + 1}`;

          let listText = document.createTextNode(arr[i][base]);
          li.appendChild(listText);
          list.appendChild(li);
          cardNew.appendChild(list);
          var li = document.createElement("li");
        }
        let buttonText = document.createTextNode(arr[i].fees + "Rs");
        button.appendChild(buttonText);
        cardNew.appendChild(button);

        cardsInPricing.appendChild(cardNew);
      }
    }
  })
  .catch((err) => {
    console.log(err);
  });
