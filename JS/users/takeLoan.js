const myForm = document.querySelector("form"),
errorText = myForm.querySelector(".error-text");

const saveBtn = document.querySelector(".modal-footer button");



saveBtn.onclick = () => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../controller/takeLoan.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                
                let data = xhr.response;
                console.log(data);
                if (data === "Success") {
                    location.href = "../dashboard/takeLoan.php";
                }else {
                    errorText.textContent = data;
                    errorText.style.display = "block";
                }
            }
        }
    }

    let formData = new FormData(myForm);
    xhr.send(formData);
}