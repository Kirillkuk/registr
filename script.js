    //var elem = document.getElementById('divv');
    //elem.onmouseenter = Enter;

    //var sect = document.getElementById('secti');
    //sect.addEventListener("mouseleave", handler1);
    // function SayHello(){
    //     var log = document.registr.login.value;
    //     if (log != "") alert('Привет, ' + log);
    // }
    // function Enter(){
    //     elem.style.background = 'green';
    // }
    // function handler1(){
    //     if (sect.style.background == 'blue'){
    //         sect.style.background = 'red'; 
    //     }
    //     else sect.style.background = 'blue';
    // }

function reg(){

    login = document.registr.login.value;
    pas = document.registr.pas.value;
    email = document.registr.email.value;

    var result = true;

    if (login.toString().length < 5){
        document.getElementById("forlog").innerHTML = "Логин должен иметь длину не меньше 5 символов!";
        document.getElementById("forlog").className = "visibleinitial";
        document.registr.login.className = "inpred";

        result = false;

    }
    else{
        document.getElementById("forlog").className = "visiblenone";
        document.registr.login.className = "inp";
    }
    if (email.toString().length < 7 || !email.toString().includes(".")){
        document.getElementById("formail").innerHTML = "Введите почту праивльно! Длина почты - не меньше 7!";
        document.getElementById("formail").className = "visibleinitial";
        document.registr.email.className = "inpred";

        result = false;
    }
    else{
        document.getElementById("formail").className = "visiblenone";
        document.registr.email.className = "inp";
    }
    if (pas.toString().length < 5){
        document.getElementById("forpas").innerHTML = "Пароль должен иметь длину не меньше 5 символов!";
        document.getElementById("forpas").className = "visibleinitial";
        document.registr.pas.className = "inpred";

        result = false;

    }
    else{
        document.getElementById("forpas").className = "visiblenone";
        document.registr.pas.className = "inp";
    }

    if (result == false) return;

    console.log("Данные из текстовых полей: " +login+" "+pas+" "+email);
    var mailing_console = false;
    if (document.registr.mailing.checked) {
        mailing_console = document.registr.mailing.value;
        console.log("Данные из переключателей: " + mailing_console);
    }
    var mailing = document.registr.mailing.checked;

    for (i=0;i<document.registr.gender.length;i++)
    {
        if (document.registr.gender[i].checked){
            gender = document.registr.gender[i].value;
        }
    }
    console.log("Данные из переключателей: "+gender);

    var sity_en;
    var sity_ru;
    var index;
    index = document.registr.sity.selectedIndex;
    sity_en = document.registr.sity[index].value;
    sity_ru = document.registr.sity[index].text;
    console.log("Данные из выпадающего списка: " + index + " "+ sity_en + " "+ sity_ru);

}

function getCookie(name) {
  let matches = document.cookie.match(new RegExp(
    "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
  ));
  return matches ? decodeURIComponent(matches[1]) : undefined;
}
function setCookie(name, value, options = {}) {

    options = {
      path: '/',
      // при необходимости добавьте другие значения по умолчанию
      ...options
    };
  
    if (options.expires instanceof Date) {
      options.expires = options.expires.toUTCString();
    }
  
    let updatedCookie = encodeURIComponent(name) + "=" + encodeURIComponent(value);
  
    for (let optionKey in options) {
      updatedCookie += "; " + optionKey;
      let optionValue = options[optionKey];
      if (optionValue !== true) {
        updatedCookie += "=" + optionValue;
      }
    }
  
    document.cookie = updatedCookie;
  }

  function deleteCookie(name) {
    setCookie(name, "", {
      'max-age': -1
    })
  }
  function SetTheme(){
       if (getCookie("theme") == undefined){
           setCookie("theme","light")
           return;
       }
       else if (getCookie("theme") == "light")
       {
            setCookie("theme","dark");
            ChangeTheme();
       }   
       else
       {
        setCookie("theme","light");
        ChangeTheme();
       }
       SetText();
  }
  function ChangeTheme(){
      var cl = ["dark","light"];

     if (getCookie("theme") == "light"){
         setCookie("theme","dark");
         cl = ["dark","light"];
     }
     else
     {
        setCookie("theme","light");
        cl = ["light","dark"];
     } 
    document.body.classList.add(cl[0]);
    document.body.classList.remove(cl[1]);
    var s = document.getElementsByTagName("section");
    for (var section of s)
    {
        section.classList.add(cl[0]+"_border");
        section.classList.remove(cl[1]+"_border");
    }
    var f = document.querySelector("form");
    f.classList.add(cl[0]+"_border");
    f.classList.remove(cl[1]+"_border");

  }
  function LogVer(){
        var log = document.getElementById("login");

  }
  function SaveText(input){

    localStorage.setItem(input.name,input.value);


  }
 function SetText(){
    document.registr.login.value = localStorage.getItem("login");
    document.registr.pas.value = localStorage.getItem("pas");
    document.registr.email.value = localStorage.getItem("email");
 }