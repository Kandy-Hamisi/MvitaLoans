const form = document.querySelector("form"),
errorText = form.querySelector(".error-text"),
submitBtn = form.querySelector(".button input");

form.onsubmit = (e) => {
    e.preventDefault();
}

submitBtn.onclick = () => {
    
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../controller/loanPlan.php");
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                if (data == "Success") {
                    location.href = "../dashboard/loanPlan.php";
                }else{
                    errorText.textContent = data;
                    errorText.style.display = "block";
                }
            }
        }
    }


    let formData = new FormData(form);
    xhr.send(formData);
}