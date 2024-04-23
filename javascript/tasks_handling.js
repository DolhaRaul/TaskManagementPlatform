function add_task(){
    let task_info = document.getElementById("taskAdder").value;
    if(task_info.length > 0){ //nu este string ul vid!!!
        let task_list = document.getElementById("taskList")
        let new_task = document.createElement("li");
        //setam numele task ului
        new_task.appendChild(document.createTextNode(task_info));
        //adaugam la final buton de delete
        add_delete_button(new_task);
        task_list.appendChild(new_task);
    }
    else
        alert("Trebuie sa scrii ceva pentru a adauga task ul!");
}

/**
 * @param liItem - un li pentru o lista neordonata ul
 * Adaugam pentru un li oarecare buton de close(de delete li = task respectiv)
 * la final(ca si copil)
 */
function add_delete_button(liItem){
    let close_button = document.createElement("span");
    close_button.appendChild(document.createTextNode("\u00D7"));
    close_button.className = "delete";
    liItem.appendChild(close_button);
}
function add_close_buttons() {
    let liItems = document.querySelectorAll("li");
    let arrayOfLiItems = [...liItems];
    arrayOfLiItems.forEach(liItem => add_delete_button(liItem));
}