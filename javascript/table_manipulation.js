
/**
 * Filter the table rows that contain the certain text introduced in
 * the input field. The table is filtered based on the case-sensitive
 * or case-insensitive option picked
 */
function text_search() {
    $(document).ready(function (){
        let valueCheckedRadioButton = $("input[name='searchType']:checked").val();
        let text_value;
        if (valueCheckedRadioButton === "case_insensitive") {
            text_value = $("#textToFind").val().toLowerCase();
            $("table tr").filter(function (){
                $(this).toggle($(this).text().toLowerCase().indexOf(text_value) > -1)
            });
        }
        else {
            text_value = $("#textToFind").val();
            $("table tr").filter(function (){
                $(this).toggle($(this).text().indexOf(text_value) > -1)
            });
    }});
}


