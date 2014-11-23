

function proc(page) {
	$('.gppb_menu').slideUp(1000);	
	$('.gppb_content').load(page + ".php").slideDown(1000);
}

function backtoproc() {
    $('.gppb_menu').slideDown(1000);	
	$('.gppb_content').slideUp(1000);

}


function search116_name(){
	var str = $('.search116_str').val();

	 $.ajax({
	 	url:"51_query.php",
	 	type:"post",
	 	data: '&str=' + str,
	 	success:function(result){
    alert(result);

    $(".51data").html(result);
 	

 	 }});
}

$('.intr_btn').bind('click', function(){
	var text1 = $('.interpret_result_text1').text();
	var text2 = $('.interpret_result_text2').text();

$(this).hide();

      $(".interpret_result").typed({
        strings: [text1],
        typeSpeed: 0,
            backDelay: 0,
            loop: false,
            
      });
setTimeout(function(){

          $(".interpret_result2").typed({
        strings: [text2],
        typeSpeed: 0,
            backDelay: 0,
            loop: false,
            
      });
  }, 18000)
})
