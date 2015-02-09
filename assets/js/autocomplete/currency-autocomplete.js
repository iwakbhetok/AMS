$(function(){
  var mail_detail = [
    { value: 'Afghan afghani', data: 'AFN' },
    { value: 'Albanian lek', data: 'ALL' },
    { value: 'Algerian dinar', data: 'DZD' },
    { value: 'European euro', data: 'EUR' },
    { value: 'Angolan kwanza', data: 'AOA' },
    { value: 'East Caribbean dollar', data: 'XCD' },
    { value: 'Argentine peso', data: 'ARS' },
    { value: 'Armenian dram', data: 'AMD' },
    { value: 'Aruban florin', data: 'AWG' },
    { value: 'Australian dollar', data: 'AUD' },
    { value: 'Azerbaijani manat', data: 'AZN' },
    { value: 'Bahamian dollar', data: 'BSD' },
    { value: 'Bahraini dinar', data: 'BHD' },
    { value: 'Bangladeshi taka', data: 'BDT' },
    { value: 'Barbadian dollar', data: 'BBD' },
  ];
  
  // setup autocomplete function pulling from mail_detail[] array
  $('#mail_number').autocomplete({
	source:"<php echo base_url('mail/get_mail_numbers');?>",
    lookup: mail_detail,
    onSelect: function (suggestion) {
      var thehtml = '<strong>Currency Name:</strong> ' + suggestion.value + ' <br> <strong>Symbol:</strong> ' + suggestion.data;
      $('#outputcontent').html(thehtml);
	  $('#mail_from').val(suggestion.data);
    }
  });
  

});