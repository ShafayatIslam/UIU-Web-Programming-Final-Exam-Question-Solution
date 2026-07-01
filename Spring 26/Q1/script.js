let heartRate_input = document.getElementById("rate");
let spo2_input = document.getElementById("spo2");
let button = document.getElementById("btn");

let report = document.getElementById("report");
let feedback = document.getElementById("feedback");

let heartRates = [];
let spo2s = [];

function prepareReport(){
    let heartRate = parseInt(heartRate_input.value);
    let spo2 = parseInt(spo2_input.value);

    if(isNaN(heartRate) || isNaN(spo2)){
        alert("Enter valid Heart rate and SpO2.");
        return;
    }

    heartRates.push(heartRate);
    spo2s.push(spo2);

    let totalRate = 0;
    let rateFreq = 0;
    heartRates.forEach(rate => {
        rateFreq++;
        totalRate += rate;
    });
    let avgRate = totalRate / rateFreq;

    let totalSpo2 = 0;
    let spo2Freq = 0
    spo2s.forEach(spo2 => {
        spo2Freq++;
        totalSpo2 += spo2;
    })
    let avgSpo2 = totalSpo2 / spo2Freq;

    let score = (100 - spo2) * 2 + Math.abs(heartRate - 80) * 0.5;
    let rep = "Average Heart rate: "+avgRate+"<br>"+"Average Oxygen Saturation: "+avgSpo2+"<br>"+"Risk Score: "+score+"<br>";
    report.innerHTML = rep;

    let fb = "";
    if(score <= 10) fb = "SAFE";
    else if(score >10 && score <= 20) fb = "WARNING";
    else fb = "DANGER";

    feedback.innerHTML = fb;

}

button.addEventListener("click", (e) => {
    prepareReport();
});