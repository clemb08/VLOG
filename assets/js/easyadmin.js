import '../css/admin/newAudit.scss';

$(document).ready(function() {

    const $valueSpanTranspOwner = $('#value_transparency_owner');
    const $valueTranspOwner = $('.rangeOwner');
    $valueSpanTranspOwner.html($valueTranspOwner.val());
    $valueTranspOwner.on('input change', () => {
  
      $valueSpanTranspOwner.html($valueTranspOwner.val());
    });

    const $valueSpanTranspAccounts = $('#value_transparency_accounts');
    const $valueTranspAccounts = $('.rangeAccounts');
    $valueSpanTranspAccounts.html($valueTranspAccounts.val());
    $valueTranspAccounts.on('input change', () => {
  
      $valueSpanTranspAccounts.html($valueTranspAccounts.val());
    });

    const $valueSpanQuality = $('#value_quality_selection');
    const $valueQuality = $('.rangeQuality');
    $valueSpanQuality.html($valueQuality.val());
    $valueQuality.on('input change', () => {
  
      $valueSpanQuality.html($valueQuality.val());
    });

    const $valueSpanRelationship = $('#value_local_relationship');
    const $valueRelationship = $('.rangeRelationship');
    $valueSpanRelationship.html($valueRelationship.val());
    $valueRelationship.on('input change', () => {
  
      $valueSpanRelationship.html($valueRelationship.val());
    });

    const $valueSpanFinancial = $('#value_local_financial');
    const $valueFinancial = $('.rangeFinancial');
    $valueSpanFinancial.html($valueFinancial.val());
    $valueFinancial.on('input change', () => {
  
      $valueSpanFinancial.html($valueFinancial.val());
    });

    const $valueSpanEcological = $('#value_local_ecological');
    const $valueEcological = $('.rangeEcological');
    $valueSpanEcological.html($valueEcological.val());
    $valueEcological.on('input change', () => {
  
      $valueSpanEcological.html($valueEcological.val());
    });

    const $valueSpanResults = $('#value_results');
    const $valueResults = $('.rangeResults');
    $valueSpanResults.html($valueResults.val());
    $valueResults.on('input change', () => {
  
      $valueSpanResults.html($valueResults.val());
    });

  });

  $(document).ready(function() {


    const $valueSpanSecurity = $('#value_security_selection');
    const $valueSecurity = $('.rangeSecurity');
    $valueSpanSecurity.html($valueSecurity.val());
    $valueSecurity.on('input change', () => {
  
      $valueSpanSecurity.html($valueSecurity.val());
    });

    $("#audit_feeExistence").change(function() {
      var str = "";
      $("#audit_feeExistence option:selected").each(function() {
        str += $(this).text();
      });
      console.log(str);
      if(str == "No") {
        $("#audit_fee").prop("disabled", true);
      } else {
        $("#audit_fee").prop("disabled", false);
      }
    })
    .change();


});