 // Select table and add click event listener
const table = document.getElementById('dataTable');
    table.addEventListener('click', function (event) {
        const row = event.target.closest('tr'); // Find the clicked row
        if (row && row.rowIndex > 0) { // Exclude header row
            const cells = row.getElementsByTagName('td'); // Get all cells in the row
            if (cells.length > 0) {
            
            // Populate input fields with row values
            document.getElementById('AccessionNumber').value = cells[1].textContent;
            document.getElementById('DateReceived').value = cells[2].textContent;
            document.getElementById('Classification').value = cells[3].textContent;
            document.getElementById('Pages').value = cells[8].textContent;
            document.getElementById('Copies').value = cells[12].textContent;
            document.getElementById('Available').value = cells[13].textContent;
            document.getElementById('Author').value = cells[4].textContent;
            document.getElementById('Title').value = cells[5].textContent;
            document.getElementById('Edition').value = cells[6].textContent;
            document.getElementById('Volumes').value = cells[7].textContent;
            document.getElementById('Published').value = cells[11].textContent;
            document.getElementById('Sourceoffound').value = cells[9].textContent;
            document.getElementById('Costprice').value = cells[10].textContent;
            document.getElementById('Year').value = cells[14].textContent;
            document.getElementById('remarks').value = cells[15].textContent;
            }
        }
        });