function validate_email(){
    let email_input = document.getElementById("email");
    let email_status = email_input.checkValidity();
    let tick_mark = document.getElementById("email").nextElementSibling;
    if(email_status){
        tick_mark.style.visibility = "visible";
        return true;
    }
    tick_mark.style.visibility = "hidden";
    return false;
}

function validate_password() {
    let passw_input = document.getElementById("passw");
    let passw_status = passw_input.checkValidity();
    let tick_mark = document.getElementById("passw").nextElementSibling;
    if(passw_status){
        tick_mark.style.visibility = "visible";
        return true;
    }
    tick_mark.style.visibility = "hidden";
    return false;
}

function validate_login(){
   alert(validate_email() && validate_password() ?
       "Datele au fost introduse corect si trimise!"
       : "Nu s-au introdus corect toate datele!");
}

function validate_fname() {
    let fname_input = document.getElementById("fname");
    let fname_status = fname_input.checkValidity();
    let tick_mark = document.getElementById("fname").nextElementSibling;
    if(fname_status){
        tick_mark.style.visibility = "visible";
        return true;
    }
    tick_mark.style.visibility = "hidden";
    return false;
}

function validate_lname() {
    let lname_input = document.getElementById("lname");
    let lname_status = lname_input.checkValidity();
    let tick_mark = document.getElementById("lname").nextElementSibling;
    if(lname_status){
        tick_mark.style.visibility = "visible";
        return true;
    }
    tick_mark.style.visibility = "hidden";
    return false;
}

function validate_gender () {
    let radio_buttons = document.getElementsByName("gender");
    let gender_chosen = false;
    for(let radio of radio_buttons){
        if(radio.checked)
            gender_chosen = true;
    }
    let tick_mark =  document.getElementById("female_gender").nextElementSibling;
    if(gender_chosen) {
        tick_mark.style.visibility = "visible";
        return true;
    }
    tick_mark.style.visibility = "hidden";
    return false;
}

/**
 * Filter the cities in the select option THAT start with the text
 * introduced in the user in the input field, with the label
 * "Filter cities to pick here:"
 */
function filter_cities() {
    $(document).ready(function() {
        let filterValue = $("#cityFilter").val().toLowerCase(); // Get the filter value and convert it to lowercase
        $("#city").children().hide() // Hide all options initially
            .filter(function() {
                return $(this).text().toLowerCase().startsWith(filterValue); // Filter options based on text content
            })
            .show(); // Show filtered options
    });
}

/**
 * @returns {boolean}
 * Pick the city from the list of options predefined and automatically
 * completes the country associated
 */
function region_pick() {
    let city_picker = document.getElementById("city")
    let city_pick_value = city_picker.value;
    let capitals = [...city_picker.children];
    capitals = capitals.map(city_option => city_option.value);
    const countries_associated = ["Romania", "United States", "China", "Italy"
    ,"Czech Republic", "Moldova", "Poland", "Anglia", "Danemarca", "Germania" ]
    let pos_capital_picked = capitals.indexOf(city_pick_value);
    let tick_mark = document.getElementById("country").nextElementSibling;
    if(pos_capital_picked === -1) {
        tick_mark.style.visibility = "hidden";
        return false;
    }
    let country_pick = countries_associated.at(pos_capital_picked);
    let country_show = document.getElementById("country");
    country_show.visibility = "visible";
    country_show.value = country_pick;
    tick_mark.style.visibility = "visible";
    return true;
}

/**
 * @return true - dacă toate datele AU fost corect introduse, putand
 * sa se trimita datele a se procesa la nivel de server
 * @return false - in caz contrar
 */
function validate_register(){
    if(validate_fname() && validate_lname() && validate_email() && validate_password()
        && validate_gender() && region_pick()) {
        alert("Datele de inregistrare au fost trimise!");
        return true;
    }
    else{
        alert("Nu s-au introdus corect toate datele!");
        return false;
    }
}