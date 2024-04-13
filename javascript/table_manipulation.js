
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
function sort_by_columns() {
    $(document).ready(function() {
        $('#stats th').click(function() {
            var table = $(this).closest('table');
            var rows = table.find('tr:gt(0)').toArray().sort(compareRows($(this).index()));
            this.asc = !this.asc;
            if (!this.asc) { rows = rows.reverse(); }
            for (var i = 0; i < rows.length; i++) { table.append(rows[i]); }
        });
    });
}

function compareRows(index) {
    return function(a, b) {
        var valA = getCellValue(a, index), valB = getCellValue(b, index);
        return $.isNumeric(valA) && $.isNumeric(valB) ? valA - valB : valA.localeCompare(valB);
    };
}

function getCellValue(row, index) {
    return $(row).children('td').eq(index).text();
}