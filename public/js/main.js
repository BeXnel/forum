function myFunction() {
    document.getElementById("comment").innerHTML = "Paragraph changed!";
  }

  function makeInput() {
    e = document.getElementById("comment")
    e.innerHTML = '<input class="form-control" value="'+e.innerText+'">';
 }

 function makeSubmit() {
    e = document.getElementById("edit_button")
    e.innerHTML = '<input class="btn btn-secondary form-control bg-dark" value="Zapisz">';
 }

 "use strict";

 (() => {
   const jsTextBlock = document.getElementById('js-text-block'),
         jsTextInput = document.getElementById('js-text-value');
 
   if (jsTextInput.value.length === 0) {
     jsTextBlock.innerHTML = 'Temat postu';
   }
 
   jsTextInput.addEventListener('input', () => {
     jsTextBlock.setAttribute('data-text', jsTextInput.value);
     jsTextBlock.innerHTML = jsTextBlock.getAttribute('data-text');
 
     if (jsTextInput.value.length === 0) {
       jsTextBlock.innerHTML = 'Temat postu';
     }
   });
 })();

 (() => {
   const jsTextBlock = document.getElementById('js-text-block-category'),
         jsTextInput = document.getElementById('js-text-value-category');
 
   if (jsTextInput.value.length === 0) {
     jsTextBlock.innerHTML = 'Kategoria';
   }
 
   jsTextInput.addEventListener('input', () => {
     jsTextBlock.setAttribute('data-text', jsTextInput.value);
     jsTextBlock.innerHTML = jsTextBlock.getAttribute('data-text');
 
     if (jsTextInput.value.length === 0) {
       jsTextBlock.innerHTML = 'Kategoria';
     }
   });
 })();
 