$(document).ready(function () {





    var searchUrl='/search';




 $('#btnSearch').click(function(e){
     e.preventDefault();









     var search=$('#searchText').val();


     $.ajax({
         method:'get',
         url:BASE_URL+searchUrl,
         data:{_token:csrf,'search':search},
         success:function(data){



             var text='';


             console.log(data);

             if(data.data.length==0){text="<div class=\"alert alert-danger alert-block text-center\">\n" +
                 "        <button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>\n" +
                 "        <strong>The post you're looking for does not exist!</strong>\n" +
                 "    </div>";}
             else {


                 for (var i = 0; i < data.data.length; i++) {
                     text += writePosts(data.data[i]);}

                 text+=writePag(data.last_page,data.current_page,data.next_page_url,data.prev_page_url);


             }










             $('#review-holder').html(text);

            // console.log(data);



         },
         error:function(){


         }

     });







 });


 $(document).on('click','.pagination a',function(e){
     e.preventDefault();
     var page=$(this).attr('href').split('page=')[1];
     fetch_data(page);

     
 });
    function fetch_data(page) {

        var urlPretrazivaca='/ajax/reviews?page=';

        var pretraga='';


        var search=$('#searchText').val();
        if(search){
            urlPretrazivaca='/search?page=';
            pretraga=search;

        }



         $.ajax({
             method:'get',
             url:BASE_URL+urlPretrazivaca+page,
             data:{'search':pretraga},
             success:function(data){
                 var text='';
                 for (var i = 0; i < data.data.length; i++) {
                     text += writePosts(data.data[i]);}

                 text+=writePag(data.last_page,data.current_page,data.next_page_url,data.prev_page_url);





                 $('#review-holder').html(text);


             }
         });
        
    }

    function writePosts(data){
        var nesto=data.gameplay.substring(0,500);
        return`<div class="review-item">
            <div class="row">
                <div class="col-lg-4">
                    <div class="review-pic">
                        <img src="${assetPath}img/games/${data.post_image}" alt="${data.post_title}">
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="review-content text-box text-white">
                        <div class="rating">
                            <h5><i>Rating</i><span>${data.final_rating}</span> / 5</h5>
                        </div>
                        <div class="top-meta">${data.post_created_on} / by ${data.name} ${data.lastname}</div>
                        <h3>${data.post_title}</h3>
                        <p>${nesto+'...'}</p>
                        <a href="${BASE_URL}/reviews/${data.id_post}" class="read-more">Read More  <img src="${assetPath}img/icons/double-arrow.png" alt="#"/></a>
                    </div>
                </div>
            </div>
        </div>`
    }

    function writePag(data,current_page,next_page,prev_page){
           var prev='';

           var koJeSetovao='reviews';
           if($('#searchText').val()){koJeSetovao='search';}


        if(prev_page==null){
            prev='<li class="page-item disabled" aria-disabled="true" aria-label="&laquo; Previous"><span class="page-link" aria-hidden="true">&lsaquo;</span></li>';

        }
        else{
            prev='<li class="page-item"  aria-label="&laquo; Previous"><a class="page-link" href="'+prev_page+'" rel="previous"  aria-label="Previous &lsaquo;">&lsaquo;</a></li>';
        }

          var next='';
        if(next_page==null){
            next='<li class="page-item disabled" aria-disabled="true" aria-label="&rsaquo; Next"><span class="page-link" aria-hidden="true">&rsaquo;</span></li>';

        }
        else{
            next='<li class="page-item"><a class="page-link" href="'+next_page+'" rel="next" aria-label="Next &raquo;">&rsaquo;</a></li>';
        }





         var linkovi='';
         for(var i=1;i<=data;i++){
             if(i==current_page){linkovi+='<li class="page-item active" aria-current="page"><span class="page-link">'+i+'</span></li>';}
             else {
                 linkovi += '<li class="page-item"><a class="page-link" href="http://localhost/php2_sajt2_2019/public/'+koJeSetovao+'?page=' + i + '">' + i + '</a></li>';
             }

         }
         console.log(linkovi);

        return`  <ul class="pagination" role="navigation">
                                  ${prev}
                                  ${linkovi}
                                  ${next}
            
                     
                                                        
        
                    
            </ul>`

    }

});
