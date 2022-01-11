const form = document.querySelector(".myCard form"),
continueBtn = form.querySelector(".button input"),
errorText = form.querySelector(".error-text");

form.onsubmit = (e)=>{
    e.preventDefault(); // preventing form from submitting
}



continueBtn.onclick = ()=>{
    
    // The start of Ajax
    let xhr = new XMLHttpRequest(); //creating XML object
    xhr.open("POST", "../users/controller/login.php", true);
    xhr.onload = ()=>{
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                console.log(data);
                if(data == "Success"){
                    location.href = "../users/dashboard/index.php";
                }else{
                    errorText.textContent = data;
                    errorText.style.display = "block";
                }
            }
            
        }
    }

    // we have to send the form data through ajax to php
    let formData = new FormData(form); //Creating new formData Object
    xhr.send(formData); //sending the form data to php
}


