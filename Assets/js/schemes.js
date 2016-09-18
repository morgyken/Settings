/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function () {
    $("#type").change(function () {
        var current = $(this).val();
        var label = $("label[for=amount]");
        if (current > 1) {
            $("#amount").attr('disabled', false);
            label.html((current == 2) ? "Capitation Amount" : "Copay Amount");
        } else {
            $("#amount").attr('disabled', true);
            label.html("Amount");
        }
    });
    $("#amount").change();
    $("#effective_date").datepicker({dateFormat: 'yy-mm-dd', onSelect: function (date) {
            $("#expiry_date").datepicker('option', 'minDate', date);
        }, changeYear: true, changeMonth: true});
    $("#expiry_date").datepicker({dateFormat: 'yy-mm-dd', changeYear: true, changeMonth: true});
    try {
        $('table').DataTable();
    } catch (p) {
    }
});