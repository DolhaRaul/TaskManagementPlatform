function validate_login(){
   let form = document.forms["login_form"];
   let status = true;
   for(input_el of form){
       if (!input_el.checkValidity())
        status = false;
   }

   alert(status == true ?
       "Datele au fost introduse corect si trimise!"
       : "Nu s-au introdus corect toate datele!");
}

function validate_register(){
    let form = document.forms["register_form"];
    let status = true;
    for(input_el of form){
        if(!input_el.checkValidity()){
            status = false;
        }
    }
    alert(status == true ?
        "Inregistrarea s-a facut corespunzator!"
        : "Nu s-au introdus corect toate datele!");
}