const form = document.querySelector("form"),
submitBtn = form.querySelector(".button input"),
// form fields
ward = form.querySelector("#ward"),
residence = form.querySelector("#residence"),
guaranter = form.querySelector("#gname"),
guaranterId = form.querySelector("#gid"),
loanAmount = form.querySelector("#amount"),
loanPlan = form.querySelector("#loanplan");


const guarName = document.querySelector(".first span");
const guarId  = document.querySelector(".second span");
const countyWard  = document.querySelector(".third span");
const areaResidence  = document.querySelector(".fourth span");

const loanOutput = document.querySelector(".uno span");
const interestRate  = document.querySelector(".dos span");
const overdueRate  = document.querySelector(".tres span");
const totalOutput  = document.querySelector(".quatro span");
const perMonthPay  = document.querySelector(".quince span");

form.onsubmit = (e) => {
    e.preventDefault();
}

const getPayment = () => {
    let interest = 0;
    let overdue = 0;
    let finalPay = 0
    // check and assign values of interes rates and overdue rates;
    if (loanPlan.value == 1) {
        months = 12;
        interest = 0.04;
        overdue = "3%";
        finalPay = parseInt(loanAmount.value) + (interest * loanAmount.value);
        monthly = Math.ceil(finalPay / months);
        totalOutput.textContent = finalPay;
        loanOutput.textContent = loanAmount.value;
        perMonthPay.textContent = monthly;
        overdueRate.textContent = overdue;
        interestRate.textContent = "4%";
        console.log(finalPay);

    }
}

submitBtn.onclick = (e) => {
    console.log(guarName);
    console.log(loanPlan.value);
    e.preventDefault();
    guarName.textContent = guaranter.value;
    if (ward.value == 1) {
        countyWard.textContent = "Majengo";
    }else if(ward.value == 2) {
        countyWard.textContent = "Shimanzi";
    }else if(ward.value == 3) {
        countyWard.textContent = "Old Town";
    }else if(ward.value == 4) {
        countyWard.textContent = "Tononoka";
    }else{
        countyWard.textContent = "";
    }
    // console.log(ward.value === 2 ? "Shimanzi": "error");
    guarId.textContent = guaranterId.value;
    areaResidence.textContent = residence.value;

    // calling the getPayment function
    getPayment();
}


