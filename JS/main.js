const pwd1 = document.querySelector("#password");
const pwd2 = document.querySelector("#password2");
const matching = document.querySelector(".matching");


const checkValue = () => {
    console.log(pwd1.value);
    console.log(pwd2.value);
    if (pwd1.value === pwd2.value) {
        matching.innerText = "The Two Passwords match";
    }else{
        matching.innerText = "The Two Passwords dont match";
    }
}