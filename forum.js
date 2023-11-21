let user = localStorage.getItem("data user");
let userDate = localStorage.getItem("user date");
let userTime = localStorage.getItem("user time");

let objetUser = JSON.parse(user);
let userDateInfo = JSON.parse(userDate);
let userTimeInfo = JSON.parse(userTime);

let nom = document.getElementById("name");
let day = document.getElementById("day");
let month = document.getElementById("month");
let year = document.getElementById("year");

let hours = document.getElementById("heures");
let minutes = document.getElementById("minutes");

nom.innerHTML = objetUser["identifiant"];
day.innerHTML = userDateInfo["day"]+"/";
month.innerHTML = userDateInfo["month"]+"/";
year.innerHTML = userDateInfo["year"];

hours.innerHTML = userTimeInfo["hours"]+"h";
minutes.innerHTML = userTimeInfo["minutes"];

let btn1 = document.getElementById("btn1");
let btn2 = document.getElementById("btn2");
let btn3 = document.getElementById("btn3");
let forum = document.getElementById("forum");
let themes = document.getElementById("forum-wrapper");
let h4 = document.querySelector("h4");
let img5 = document.getElementById("img5");

btn1.addEventListener("click", btn1Action);

function btn1Action () {
    forum.classList.add("block");
    themes.classList.add("none");
    h4.innerHTML = "Apprendre à jouer";
    img5.classList.add("img5-wrapper1");
  }

  btn2.addEventListener("click", btn2Action);

function btn2Action () {
    forum.classList.add("block");
    themes.classList.add("none");
    h4.innerHTML = "Partager les partitions";
    img5.classList.add("img5-wrapper2");
  }

  btn3.addEventListener("click", btn3Action);

  function btn3Action () {
      forum.classList.add("block");
      themes.classList.add("none");
      h4.innerHTML = "Echanger";
      img5.classList.add("img5-wrapper3");
    }
