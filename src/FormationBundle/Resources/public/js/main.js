$('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 150, // Creates a dropdown of 15 years to control year
    format: 'dd/mm/yyyy'
});


$ (document).ready(function() {
    $('select').material_select();
});
