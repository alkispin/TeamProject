let menu =document.querySelector("#menu-icon");
let navbar = document.querySelector(".navbar");


menu.onclick=() =>{
    menu.classList.toggle("bx-x");
    navbar.classList.toggle("active");

}

window.onscroll= () =>{
    menu.classList.remove("bx-x");
    navbar.classList.remove("active")
}

//form handle
const signContainer = document.querySelector(".sign-container");
const signIn = document.querySelector(".signIn");
const signUp = document.querySelector(".signUp");
const create =document.getElementById("create");
const signInBtn= document.getElementById("signIn-Btn");
const closeBtn =document.getElementById("closeform");
const signUpForm =document.getElementById("signUp-form");
const signInForm =document.getElementById("signIn-form");
const already = document.getElementById("already");


signIn.onclick=function(){
    console.log("paok");
    signContainer.style.visibility="visible";
    disableScroll();
}

signUp.onclick=function(){
    signContainer.style.visibility="visible";
    signInForm.setAttribute("style","transform: translate(-500px); transition: all 0s ease-out;");
    signUpForm.setAttribute("style","transform: translate(0px); transition: all 0s ease-out;");
    disableScroll();
}


closeBtn.onclick =function(){
    signContainer.style.visibility="hidden";
    signInForm.setAttribute("style","transform: translate(0); transition: all 0s ease-out;");
    signUpForm.setAttribute("style","transform: translate(500px);  transition: all 0s ease-out;");
    enableScroll();
}

//
create.onclick=function(){
    signInForm.setAttribute("style","transform: translate(-500px);");
    signUpForm.setAttribute("style","transform: translate(0);");
}

already.onclick=function(){
    signInForm.setAttribute("style","transform: translate(0);");
    signUpForm.setAttribute("style","transform: translate(500px);");
}


//function to stop scrolling when the form is open
var keys = {37: 1, 38: 1, 39: 1, 40: 1};

function preventDefault(e) {
  e.preventDefault();
}

function preventDefaultForScrollKeys(e) {
  if (keys[e.keyCode]) {
    preventDefault(e);
    return false;
  }
}

// modern Chrome requires { passive: false } when adding event
var supportsPassive = false;
try {
  window.addEventListener("test", null, Object.defineProperty({}, 'passive', {
    get: function () { supportsPassive = true; } 
  }));
} catch(e) {}

var wheelOpt = supportsPassive ? { passive: false } : false;
var wheelEvent = 'onwheel' in document.createElement('div') ? 'wheel' : 'mousewheel';

// call this to Disable
function disableScroll() {
  window.addEventListener('DOMMouseScroll', preventDefault, false); // older FF
  window.addEventListener(wheelEvent, preventDefault, wheelOpt); // modern desktop
  window.addEventListener('touchmove', preventDefault, wheelOpt); // mobile
  window.addEventListener('keydown', preventDefaultForScrollKeys, false);
}

// call this to Enable
function enableScroll() {
  window.removeEventListener('DOMMouseScroll', preventDefault, false);
  window.removeEventListener(wheelEvent, preventDefault, wheelOpt); 
  window.removeEventListener('touchmove', preventDefault, wheelOpt);
  window.removeEventListener('keydown', preventDefaultForScrollKeys, false);
}