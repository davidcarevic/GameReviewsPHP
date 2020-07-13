$(document).ready(function(){

  $('#btnComment').click(function(e){
      e.preventDefault();

      var id_post=$('#post_id').val();
      var comment=$('#comment').val();

      $('#comment').val('');




      console.log(id_post,comment);

      $.ajax({
          method:'post',
          url:BASE_URL+'/comment',
          data:{'id_post':id_post,'comment':comment,_token : csrf},
          success:function(data){

              var text='';
            for(item of data){
                text+=writeComments(item);

            }

            $('#comments').html(text);

          },
          error:function(data){
              console.log(data);


          }


      });



  });

  function writeComments(data){
      return`<section class="game-author-section">
    <div class="container">
        <div class="game-author-pic set-bg" data-setbg="${assetPath}img/${data.avatar}" style="background-image: url(&quot;${assetPath}img/${data.avatar}&quot;);"></div>
        <div class="game-author-info">
            <h4>${data.name} ${data.lastname}</h4>
            <p>${data.comment}</p>
        </div>
    </div>

</section>`
  }

});


