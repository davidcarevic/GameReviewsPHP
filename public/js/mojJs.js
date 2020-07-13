//reg check ////////////////////////




var reNiz={
    pass1:/^[A-Z\Ć\Š\Ž\Č\Đa-z\š\đ\ž\č\ć0-9]{5,30}$/,
    email:/^\S+@\w+\.(\w+\.)*\w{2,3}$/,
    name:/^[A-Z\Ć\Š\Ž\Č\Đ][a-z\š\đ\ž\č\ć]{2,19}$/,
    lastname:/^([A-Z\Ć\Š\Ž\Č\Đ][a-z\š\đ\ž\č\ć]{2,29})(\s[A-Z\Ć\Š\Ž\Č\Đ][a-z\š\đ\ž\č\ć]{2,29})*$/};







var podaci={

    pass1:"",
    email:"",
    name:"",
    lastname:"",
    pass2:""
};

$(".spi").focus(function(){




    $(this).css('border-color','red');

    $(this).blur(function(){

        var regHolder=reNiz[this.id];
        console.log(regHolder);
        if($(this).val().match(regHolder)){
            podaci[this.id]=$(this).val();
            $(this).css('border-color','green');


        }

        else{podaci[this.id]="";$("#btnReg").css("border","2px solid red");}
        for(var podatak in podaci){
            if(podaci[podatak]==""){$("#btnReg").css("border","2px solid red");}
            else{$("#btnReg").css("border","2px solid #222");}
        }
    });


});

$(".spipass").focus(function(){




    $(this).css('border-color','red');

    $(this).blur(function(){

        var regHolder=reNiz[this.id];
        console.log(regHolder);
        if($(this).val()==$('#pass1').val() && $(this).val()!=''){
            podaci[this.id]=$(this).val();
            $(this).css('border-color','green');


        }

        else{podaci[this.id]="";$("#btnReg").css("border","2px solid red");}
        for(var podatak in podaci){
            if(podaci[podatak]==""){$("#btnReg").css("border","2px solid red");}
            else{$("#btnReg").css("border","2px solid #222");}
        }
    });


});
















$("#btnReg").click(function(e){




    console.log(podaci);
    var greske=0;

    for(podatak in podaci){
        if(podaci[podatak]=="") greske++;
    }

    console.log(greske);








    if(greske>0){
        e.preventDefault();
        console.log("nije poslao");

    }


    else{




        console.log("poslao je");



    }





});

// reg check ////////////////////////////////////////////////
