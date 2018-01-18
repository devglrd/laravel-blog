$(document).ready(function(){
   console.log('dad');
   /*$('.showPost').on('click', function (e) {
      e.preventDefault();
       var id = $(this).attr('data-id');
      console.log(id);
       $.ajax({
           method: 'GET',
           cache: false,
           url: '/api/post/' + id,
       }).done(function (data) {
           if (data && data.post) {
              console.log(data.post.title, data.post.slug);
                $('.card-title').append(data.post.title);
                $('.card-text').append(data.post.content);
                $('#date').append(data.post.created_at);
               /*$('#productsInCart').append(
                   storeProductInCart(data.product.idProduct, data.product.idColor, data.product.price, data.product.name, data.product.imageColor, data.product.color, data.cartProduct, data.productAlreadyInCart)
               )
               $('#cartEmpty').hide();
               $('#cartFooter').show()
               $('#totalCart').text(data.total)
               $('#colorError').hide()
               openCart();
           }
       }).fail(function () {
           $('#colorError').show();
       });
   });*/
   $('#addComment').on('click', function (e) {
      e.preventDefault();
      $id = $('#addComment').attr('data-post');
      $val = $('#commentContain').val();
       $.ajax({
           method: 'GET',
           cache: false,
           url: '/api/post/' + $id +'/comment/' + $val,
       }).done(function (data) {
            if (data && data.comment) {
                console.log(data.comment.content);
                $('#newComm').append(
                    loadComment(data.comment.content, data.comment.id)
                )
            }
         }).fail(function () {
             console.log('fail');
         });
  });
    $('.deleteCom').on('click', function (e) {
        e.preventDefault();
        $id = $(this).attr('data-id');
        $.ajax({
            method: 'GET',
            cache: false,
            url: '/api/comment/delete/'+$id,
        }).done(function (data) {
            if($('#commentIn'+$id).attr('data-id-comment')  ===  $id){
                $('#commentIn'+$id).remove();
            }
        }).fail(function () {
            console.log('fail');
        });
    });
    $('#newComm').on('click',function(){
        alert('zddaz');
    });
});

function loadComment(content, id) {
    return '<div class="card my-2" id="commentIn'+id+'" data-id-comment="'+ id +'">' +
        '<div class="card-body">' +
        '<div class="card-text">' +
        '<span>'+ content +'</span>' +
        '</div>' +
        '</div>' +
        '<div class="card-footer">' +
        '<a href="/app/post/comment/modify/'+ id +'" class="btn btn-primary">Modifier mon commentaire !</a>' +
        '<span id="deleteCom'+id+'" data-id="'+id+'" class="deleteCom btn btn-danger" style="margin-left:4px">delete</span>' +
        '</div>' +
        '</div>'
}
