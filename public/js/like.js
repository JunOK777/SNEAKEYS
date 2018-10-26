var reviewId = 0;


$(document).on('click', '#like', function(){
    
    event.preventDefault();
    //どの投稿が押されたのかを判別する
    // reviewId = event.target.parentNode.parentNode.parentNode.parentNode.dataset['reviewId'];

    const reviewId = $('#like > #reviewID').val()

    const urlLike = `/like/${reviewId}`
    const _token  = $('meta[name="csrf-token"]').attr('content')
 console.log(urlLike)
    $.ajax({
        method: 'POST',
        url: urlLike, //route('like')
        data: {reviewId: reviewId, _token: _token}
    })
    //成功時の処理
    .done(function(data) {
      //「いいね」ボタンを押下済に切り替える
      document.getElementById('like').innerHTML = '<i class="fas fa-thumbs-up"></i>'
    });
});