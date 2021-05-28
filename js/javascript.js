$(document).ready(function(){
    $('.hamburger').on("click",function(){
        $(".nav-grid-logo").toggleClass("open");
    });
});
function myFunction(x) {
    x.classList.toggle("change");
  }

function doTestClick() {
    frm_test.submit(); 
};
function doSubmit(form) {
    alert(form.test.value);
};
