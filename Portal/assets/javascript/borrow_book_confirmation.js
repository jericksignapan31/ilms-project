let qrImg = document.getElementById('qrImage');
let sID = document.getElementById('sID');

function generateQR(){
    qrImg.src="https://api.qrserver.com/v1/create-qr-code/?size=100x100&data=" + sID.textContent;

    const sidebar = document.querySelector('.qrBox')
    sidebar.style.display = 'block'
}

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