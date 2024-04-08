function add_task(){
    let task_info = document.getElementById("taskAdder").value;
    if(task_info.length > 0){ //nu este string ul vid!!!
        let task_list = document.getElementById("taskList")
        let new_task = document.createElement("li");
        new_task.appendChild(document.createTextNode(task_info));
        task_list.appendChild(new_task);
    }
}