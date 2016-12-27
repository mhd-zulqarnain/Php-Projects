



$(document).ready(function () {

    function admFunc(){
        var $val=$(".grab").val();
        var $id=$(".vid").val();
        if($val!="")
        {
            $obj={
                data:"udata",
                vid:$id
            };
            $.ajax({
                type:"Post",
                url:"function/function.php",
                data:$obj,
                success:function (success) {
                    setTimeout(function () {
                        location.reload(1);
                    },3000)
                },
                error:function (error) {
                    alert('error')
                }
            });
        }
    }

//-----------admin----------

    $('.disform :checkbox').change(function () {

        if(this.checked){

            if(confirm("Are you sure the post will be deleted")){
                $pid=$(this).val();
                console.log($pid);
                $obj={
                    data:'disapprove',
                    pid:$pid
                };

                $.ajax({
                    type:"POST",
                    url:"function/function.php",
                    data:$obj,
                    success:function (success) {
                        alert('post has been disapprove');
                        location.reload();
                    },
                    error:function (error) {
                        alert('function error');
                    }
                });

            }
        }

    })
    $('.myform :checkbox').change(function() {


        if(this.checked){
            if(confirm("are your sure")){
                var $pid=$(this).val();

                var $object={

                    data:"update",
                    pid:$pid,
                };

                $.ajax({
                    type:"POST",
                    url:"function/function.php",
                    data:$object,
                    success:function (response) {
                        alert('Post has been approved');
                        location.reload();
                    },
                    error:function (error) {
                        alert('error');
                    }


                });


            }
            else
                $(this).prop("checked",false)
        }
        else {

        }
    });

    function admFunc(){

        var $valu=$(".grab").val();
        if($valu!=""){
            $.ajax({
                type:"POST",
                url:"function/function.php",
                data:"data",
                success:function (success) {
                    setTimeout(function () { location.reload(1); }, 1000);

                },
                error:function (error) {
                    alert("error in notification");

                }


            });}
    }


    $(".target").on("click",function () {
        /*  $(this).siblings()
         .slideToggle(1000);*/

        $(this).siblings()
            .slideToggle(1000);

        $var=$(this).closest(".row1").siblings("div").find("div.dist").slideUp(1000);
    })
///end admin------



});

////--------------------
//My js
//---------------------------



jQuery(function ($) {

    'use strict';


    // -------------------------------------------------------------
    //  ScrollUp Minimum setup
    // -------------------------------------------------------------

    (function() {

        $.scrollUp();

    }());
    

    // -------------------------------------------------------------
    //  Owl Carousel
    // -------------------------------------------------------------


    window.load=setInterval(function()
    {
        $.ajax({
            url:"update_Session.php",
            success:function(data)
            {
            }
        });
    }, 60000);

    (function() {

        $(".testimonial-carousel").owlCarousel({
            items:1,
            autoplay:true,
            autoplayHoverPause:true
        });

    }());

    (function() {

        $(".car-slider").owlCarousel({
            items:1,
            autoplay:true,
			autoplayHoverPause:true
        });

    }());


    // -------------------------------------------------------------
    //  Slider
    // -------------------------------------------------------------

    (function() {

        $('#price').slider();

    }());   
	
	
   
    
    // -------------------------------------------------------------
    //  language Select
    // -------------------------------------------------------------

   (function() {

        $('.language-dropdown').on('click', '.language-change a', function(ev) {
            if ("#" === $(this).attr('href')) {
                ev.preventDefault();
                var parent = $(this).parents('.language-dropdown');
                parent.find('.change-text').html($(this).html());
            }
        });

        $('.category-dropdown').on('click', '.category-change a', function(ev) {
            if ("#" === $(this).attr('href')) {
                ev.preventDefault();
                var parent = $(this).parents('.category-dropdown');
                parent.find('.change-text').html($(this).html());
            }
        });

    }());


    // -------------------------------------------------------------
    //  Tooltip
    // -------------------------------------------------------------

    (function() {

        $('[data-toggle="tooltip"]').tooltip();

    }());


    // -------------------------------------------------------------
    // Accordion
    // -------------------------------------------------------------

        (function () {  
            $('.collapse').on('show.bs.collapse', function() {
                var id = $(this).attr('id');
                $('a[href="#' + id + '"]').closest('.panel-heading').addClass('active-faq');
                $('a[href="#' + id + '"] .panel-title span').html('<i class="fa fa-minus"></i>');
            });

            $('.collapse').on('hide.bs.collapse', function() {
                var id = $(this).attr('id');
                $('a[href="#' + id + '"]').closest('.panel-heading').removeClass('active-faq');
                $('a[href="#' + id + '"] .panel-title span').html('<i class="fa fa-plus"></i>');
            });
        }());


    // -------------------------------------------------------------
    //  Checkbox Icon Change
    // -------------------------------------------------------------

    (function () {

        $('input[type="checkbox"]').change(function(){
            if($(this).is(':checked')){
                $(this).parent("label").addClass("checked");
            } else {
                $(this).parent("label").removeClass("checked");
            }
        });

    }()); 
	
	
	 // -------------------------------------------------------------
    //  select-category Change
    // -------------------------------------------------------------
	$('.select-category.post-option ul li a').on('click', function() {
		$('.select-category.post-option ul li.link-active').removeClass('link-active');
		$(this).closest('li').addClass('link-active');
	});

	$('.subcategory.post-option ul li a').on('click', function() {
		$('.subcategory.post-option ul li.link-active').removeClass('link-active');
		$(this).closest('li').addClass('link-active');
	});
	
    // -------------------------------------------------------------
    //   Show Mobile Number
    // -------------------------------------------------------------  

    (function () {

        $('.show-number').on('click', function() {
            $('.hide-text').fadeIn(500, function() {
              $(this).addClass('hide');
            });  
			$('.hide-number').fadeIn(500, function() {
              $(this).addClass('show');
            }); 			
        });


    }());
	
   
// script end
});

 // -------------------------------------------------------------
    //   Google Map 
    // -------------------------------------------------------------  
