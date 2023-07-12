

function searchInvoices() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("search_invoices");
  filter = input.value.toUpperCase();
  table = document.querySelector(".section-invoices__table table");
  tr = table.getElementsByTagName("tr");

  for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[3]; 
      if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
              tr[i].style.display = "";
          } else {
              tr[i].style.display = "none";
          }
      }
  }
}



  
