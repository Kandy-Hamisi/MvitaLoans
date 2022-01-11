const form = document.querySelector("form"),
errorText = form.querySelector("form .error-text"),
submitBtn = form.querySelector(".button input");

form.onsubmit = (e) => {
    e.preventDefault();
}


submitBtn.onclick = () => {
    // starting Ajax scripts
    let xhr = new XMLHttpRequest(); // new XML object
    xhr.open("POST", "../users/controller/register.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) { {
            if (xhr.status === 200) {
                let data = xhr.response;
                console.log(data);
                if (data == "Success") {
                    location.href = "login.php";
                }else{
                    errorText.textContent = data;
                }
            }
        }
            
        }
    }
    
    let formData = new FormData(form);
    xhr.send(formData);
    
}