let axios = require('axios');
var bodyFormData = new FormData();
$('body').on('click', '.frm-contact', function(){
  let id = $(this).data('id');

  axios.post('/submitContact')
    .then(function(){
      window.location.reload();
    })
    .catch(function(error){
      console.log(error);
    });
});
