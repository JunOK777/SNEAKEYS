$(document).ready(function () {
  // want
  $('#have').on('click', function() {
    let image_id = $('#image_id').val()

    let url04      = `/image/${image_id}/have/null`
    let url05      = `/image/${image_id}/have/0`
    let url06      = `/image/${image_id}/have/1`

    let _token   = $('meta[name="csrf-token"]').attr('content')

    // have
      if ( $('#want').hasClass("wanting")){
       $.post(url05, { _token: _token},
        function (match) {
          if(match.success === true){
            $('#want').removeClass('wanting').addClass('normal')
            $('#have').removeClass('normal').addClass('having')
          } else {
            alert('error!');
          }
        })
     } else if ($('#have').hasClass("having")){
      $.post(url06, { _token: _token},
        function (match) {
          if(match.success === true){
            $('#have').removeClass('having').addClass('normal')
          } else {
            alert('error!');
          }
        })
     } else {
      $.post(url04, { _token: _token},
        function (match) {
          if(match.success === true){
            $('#have').removeClass('normal').addClass('having')
          } else {
            alert('error!');
          }
        })
      }

  })
})

