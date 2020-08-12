$(document).ready(function() {

  const $valueSpan = $('#value_transparency_owner');
  const $value = $('.transparency_owner');
  $valueSpan.html($value.val());
  $value.on('input change', () => {

    $valueSpan.html($value.val());
  });
});