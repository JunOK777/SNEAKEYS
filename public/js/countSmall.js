$(document).ready(function () {
  // want
  $('#count01').on('click', function() {
    let image_id = $('#image_id').val()

    let url01      = `/image/${image_id}/small/null`
    let url02      = `/image/${image_id}/small/small`
    let url03      = `/image/${image_id}/small/other`

    let _token   = $('meta[name="csrf-token"]').attr('content')

    // want
     if ( $('#count01').hasClass("done")){
       $.post(url02, { _token: _token},
        function (match) {
          if(match.success === true){
            $('#count01').removeClass('done').addClass('circle')
            // カウント数を上げ下げ
            let num_small = match.count_small
            let num_just = match.count_just
            let num_large = match.count_large

            $('#count').html(num_small - 1);
          } else {
            alert('error!');
          }
        })
     } else if ($('#count02').hasClass("done")){
      $.post(url03, { _token: _token},
        function (match) {
          if(match.success === true){
            $('#count02').removeClass('done').addClass('circle')
            $('#count01').removeClass('circle').addClass('done')

            let num_small = match.count_small
            let num_just = match.count_just
            let num_large = match.count_large

            $('#count_just').html(num_just - 1);
            $('#count_small').html(num_small + 1);
          } else {
            alert('error!');
          }
        })
     } else if ($('#count03').hasClass("done")){
        $.post(url03, { _token: _token},
        function (match) {
          if(match.success === true){
            $('#count03').removeClass('done').addClass('circle')
            $('#count01').removeClass('circle').addClass('done')

            let num_small = match.count_small
            let num_just = match.count_just
            let num_large = match.count_large

            $('#count_large').html(num_large - 1);
            $('#count_small').html(num_small + 1);
          } else {
            alert('error!');
          }
        })
     } else {
      $.post(url01, { _token: _token},
        function (match) {
          if(match.success === true){
            $('#count01').removeClass('circle').addClass('done')
            
            let num_small = match.count_small
            let num_just = match.count_just
            let num_large = match.count_large

            $('#count').html(num_small + 1);
          } else {
            alert('error!');
          }
        })
      }

  })
})

