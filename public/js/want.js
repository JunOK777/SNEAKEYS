$(document).ready(function () {
  // want
  $('#want').on('click', function() {
    let image_id = $('#image_id').val()

    let url01      = `/image/${image_id}/want/null`
    let url02      = `/image/${image_id}/want/0`
    let url03      = `/image/${image_id}/want/1`

    let _token   = $('meta[name="csrf-token"]').attr('content')

    // want
     if ( $('#want').hasClass("wanting")){
       $.post(url02, { _token: _token},
        function (match) {
          if(match.success === true){
            $('#want').removeClass('wanting').addClass('normal')
          } else {
            alert('error!');
          }
        })
     } else if ($('#have').hasClass("having")){
      $.post(url03, { _token: _token},
        function (match) {
          if(match.success === true){
            $('#have').removeClass('having').addClass('normal')
            $('#want').removeClass('normal').addClass('wanting')
          } else {
            alert('error!');
          }
        })
     } else {
      $.post(url01, { _token: _token},
        function (match) {
          if(match.success === true){
            $('#want').removeClass('normal').addClass('wanting')
          } else {
            alert('error!');
          }
        })
      }

  })
})

