function addPatient() {

    let id = prompt("Enter Patient ID:");
    let name = prompt("Enter Patient Name:");
    let age = prompt("Enter Age:");
    let gender = prompt("Enter Gender:");
    let disease = prompt("Enter Disease:");

    if(!id || !name || !age || !gender || !disease){
        showPopup("All fields are required!");
        return;
    }

    let table = document.getElementById("patientTable");

    let row = table.insertRow();

    row.innerHTML = `
        <td>${id}</td>
        <td>${name}</td>
        <td>${age}</td>
        <td>${gender}</td>
        <td>${disease}</td>
    `;

    showPopup("Patient Added Successfully!");
}
function deletePatient() {

    let table = document.getElementById("patientTable");

    let id = prompt("Enter Patient ID to delete:");

    let rows = table.rows;

    let found = false;

    for (let i = 0; i < rows.length; i++) {

        if (rows[i].cells[0].innerText === id) {

            table.deleteRow(i);

            found = true;

            showPopup("Patient Deleted Successfully!");

            break;
        }
    }

    if (!found) {
        showPopup("Patient not found!");
    }
}
function updatePatient() {

    let table = document.getElementById("patientTable");

    let id = prompt("Enter Patient ID to update:");

    let rows = table.rows;

    let found = false;

    for (let i = 0; i < rows.length; i++) {

        if (rows[i].cells[0].innerText === id) {

            let name = prompt("Enter new Name:", rows[i].cells[1].innerText);
            let age = prompt("Enter new Age:", rows[i].cells[2].innerText);
            let gender = prompt("Enter new Gender:", rows[i].cells[3].innerText);
            let disease = prompt("Enter new Disease:", rows[i].cells[4].innerText);

            rows[i].cells[1].innerText = name;
            rows[i].cells[2].innerText = age;
            rows[i].cells[3].innerText = gender;
            rows[i].cells[4].innerText = disease;

            showPopup("Patient Updated Successfully!");

            found = true;
            break;
        }
    }

    if (!found) {
        showPopup("Patient not found!");
    }
}
function searchPatient() {

    let input = document.getElementById("searchBox").value.toLowerCase();

    let table = document.getElementById("patientTable");

    let rows = table.getElementsByTagName("tr");

    for (let i = 0; i < rows.length; i++) {

        let id = rows[i].cells[0].innerText.toLowerCase();
        let name = rows[i].cells[1].innerText.toLowerCase();

        if (id.includes(input) || name.includes(input)) {
            rows[i].style.display = "";
        } else {
            rows[i].style.display = "none";
        }
    }
}
function addDoctor() {

    let id = prompt("Enter Doctor ID:");
    let name = prompt("Enter Doctor Name:");
    let spec = prompt("Enter Specialization:");
    let contact = prompt("Enter Contact:");

    if(!id || !name || !spec || !contact){
        showPopup("All fields required!");
        return;
    }

    let table = document.getElementById("doctorTable");

    let row = table.insertRow();

    row.innerHTML = `
        <td>${id}</td>
        <td>${name}</td>
        <td>${spec}</td>
        <td>${contact}</td>
    `;

    showPopup("Doctor Added Successfully!");
}
function updateDoctor() {

    let table = document.getElementById("doctorTable");

    let id = prompt("Enter Doctor ID to update:");

    let rows = table.rows;

    let found = false;

    for(let i=0;i<rows.length;i++){

        if(rows[i].cells[0].innerText === id){

            rows[i].cells[1].innerText = prompt("New Name", rows[i].cells[1].innerText);
            rows[i].cells[2].innerText = prompt("New Specialization", rows[i].cells[2].innerText);
            rows[i].cells[3].innerText = prompt("New Contact", rows[i].cells[3].innerText);

            showPopup("Doctor Updated!");
            found = true;
            break;
        }
    }

    if(!found){
        showPopup("Doctor not found!");
    }
}
function deleteDoctor() {

    let table = document.getElementById("doctorTable");

    let id = prompt("Enter Doctor ID to delete:");

    let rows = table.rows;

    let found = false;

    for(let i=0;i<rows.length;i++){

        if(rows[i].cells[0].innerText === id){

            table.deleteRow(i);

            showPopup("Doctor Deleted!");
            found = true;
            break;
        }
    }

    if(!found){
        showPopup("Doctor not found!");
    }
}function searchDoctor() {

    let input = document.getElementById("doctorSearch").value.toLowerCase();

    let table = document.getElementById("doctorTable");

    let rows = table.getElementsByTagName("tr");

    for(let i=0;i<rows.length;i++){

        let id = rows[i].cells[0].innerText.toLowerCase();
        let name = rows[i].cells[1].innerText.toLowerCase();

        if(id.includes(input) || name.includes(input)){
            rows[i].style.display = "";
        } else {
            rows[i].style.display = "none";
        }
    }
}
function showPopup(message) {

    let popup = document.getElementById("popup");

    popup.innerText = message;

    popup.style.display = "block";

    setTimeout(() => {
        popup.style.display = "none";
    }, 2000);
}


function loginUser(event) {

    event.preventDefault(); // stop form reload

    let username = document.getElementById("username").value.trim();
    let password = document.getElementById("password").value.trim();

    let errorMsg = document.getElementById("errorMsg");

    // STRICT LOGIN RULE
    const validUser = "admin";
    const validPass = "1234";

    if (username === validUser && password === validPass) {

        errorMsg.innerText = "";

        window.location.href = "dashboard.html";

    } else {

        errorMsg.innerText = "❌ Invalid login! Access denied.";
    }

    return false;
}