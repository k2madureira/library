

$( document ).ready(function() {

	reload_Books();
	
});

$("#bt-register").click(function(){

	reload_Books();

});

function register(){

	var book 	=$("#book").val();
	var author  =$("#author").val();
	var type	=$("#type").val();

	event.preventDefault();

	if(!book || !author || !type){

		var error = document.querySelector(".error");
		error.classList.remove("vanish");

		setTimeout(function(){
			error.classList.add("vanish");
		},3000);
	}else{

		var option = 'register';

		$.ajax({
			type: 'POST',
			url:'php/controller.php',
			data: {book:book, author:author, type:type, option:option},
			success:function(data){

				
			},
			error:function(jqXHR,exception){
				if(jqXHR.status == 0){

					console.log("erro");
				}
				if(jqXHR.status == 404){

					console.log('Page not found [404]');

				}if(jqXHR.status == 105){

					console.log("error 105");
				}

			}
		});
	}


}
function LoadBooks(){

	
	var option = 'load';

	$.ajax({
		type:"POST",
		dataType:"json",
		data: {option:option},
		url:"php/controller.php",
		success:function(data){

			var books = document.querySelector(".books");
			
			
			for(var i =0; i<data.length; i++){

				//list.textContent += String(data[i]['title']) + "<br>";

				$(".books").append('<tr>'+
								'<td>'+data[i]['title']+'</td>'+
								'<td>'+data[i]['name']+'</td>'+
								'<td>'+data[i]['type']+'</td>'+
							'</tr>');

			}

		},
			error:function(jqXHR,exception){
				if(jqXHR.status == 0){

					console.log("erro");
				}
				if(jqXHR.status == 404){

					console.log('Page not found [404]');

				}if(jqXHR.status == 105){

					console.log("error 105");
				}

			}
	});
}

function reload_Books(){

	var loader = document.querySelector(".loader");
	var list = document.querySelector(".list");
	loader.classList.remove("vanish");
	list.classList.add("vanish");

	setTimeout(function(){
		loader.classList.add("vanish");
		list.classList.remove("vanish");
		LoadBooks();

	},1000);

}