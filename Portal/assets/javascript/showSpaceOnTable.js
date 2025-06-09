    // Function to replace "%" with a space in the table
    function replacePercentageWithSpace() {
        const table = document.getElementById("myTable");
        const rows = table.getElementsByTagName("tr");

        for (let i = 0; i < rows.length; i++) {
            const cells = rows[i].getElementsByTagName("td");
            for (let j = 0; j < cells.length; j++) {
                cells[j].innerHTML = cells[j].innerHTML.replace('%20', ' ');
            }
        }
    }