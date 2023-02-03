/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*********************************************!*\
  !*** ./resources/js/searchProductsTable.js ***!
  \*********************************************/
window.onload = function () {
  window.searchProductsTable = document.getElementById('productSearch').onkeyup = function () {
    // Declare letiables
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("productSearch");
    filter = input.value.toUpperCase();
    table = document.getElementById("productTable");
    tr = table.getElementsByTagName("tr"); // Loop through all list items, and hide those who don't match the search query

    for (i = 1; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[1];

      if (td) {
        txtValue = td.textContent || td.innerText;

        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }
    }
  };

  var exampleModal = document.getElementById('exampleModal');
  exampleModal.addEventListener('show.bs.modal', function (event) {
    // Button that triggered the modal
    var button = event.relatedTarget;
    var prodIdValue = button.getAttribute('prodId');
    var prodNameValue = button.getAttribute('prodName');
    var prodPriceValue = button.getAttribute('prodPrice');
    var prodQuantityValue = button.getAttribute('prodQuantity');
    var modalTitle = exampleModal.querySelector('.modal-title');
    var modalBodyInput = exampleModal.querySelector('.modal-body input'); // modalTitle.textContent = 'Modifier ce produit' + prodNameValue

    document.getElementById('prodId').value = prodIdValue;
    document.getElementById('prodName').value = prodNameValue;
    document.getElementById('prodPrice').value = prodPriceValue;
    document.getElementById('prodQuantity').value = prodQuantityValue;
  });
};
/******/ })()
;