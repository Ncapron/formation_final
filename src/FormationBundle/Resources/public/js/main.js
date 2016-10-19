$('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 150, // Creates a dropdown of 15 years to control year
    format: 'dd/mm/yyyy'
});


$ (document).ready(function() {
    $('select').material_select();
});


$(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal();
});


$('#modal1').openModal();



$('#modal1').closeModal();


