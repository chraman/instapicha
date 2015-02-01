<html>
<head><title>HashPitcha</title>
   
<style>

body {
	margin-bottom: 200px;
}

#instagram {
	float: left;
	padding: 20px;
}

.instagram-wrap {
	float: left;
	position: relative;
	background: white;
	padding: 5px;
	margin: 15px;
	box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
}

.instagram-wrap .likes {
	height: 16px;
	position: absolute;
	left: 10px;
	top: 10px;
	padding: 0 5px 0 22px;
	line-height: 16px;
	border: 1px solid #ddd;
	background: white  no-repeat 2px 0;
	opacity: 0.6;
}

.clearfix {
	 clear:both;
}

#showMore{
	background: #202628;
	margin: 20px 15px 28px;
	text-align: center;
}

#more {
padding: 10px;
margin: 20px;
color: #CCC;
font-size: 20px;
line-height: 22px;
display: block;
font-family: "brandon_bold",Arial,Helvetica,sans-serif;
}

</style>



<div id="page">
<div id="main_content_wrapper" class="clearfix">
<div id="content_wrapper_box">




<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.6.3/jquery.min.js"></script>

<style>
#main-navigation #navigation li.has-drop-down.trend{display: none;}

/******  hide the footer for easier dev *********/
#sticky-footer-wrap{/* display: none; */ }

/******  hide the footer flyouts for easier dev *********/
.sticky-flyout, #Footer_Flyout_1, #Footer_Flyout_2{ /* display: none !important; */ }
</style>


<script type="text/javascript" >


var access_token = "18360510.5b9e1e6.de870cc4d5344ffeaae178542029e98b"; 

var resolution = "thumbnail"; 


function load(next_url){

	
	url = next_url;
	
	$(function() {
	    $.ajax({
		    	type: "GET",
		        dataType: "jsonp",
		        cache: false,
		        url: url ,
		        success: function(data) {
		        
		  		next_url = data.pagination.next_url;
		  		
		  		count = 20; 
		
		  		$("#instagram").empty();
				
	            for (var i = 0; i < count; i++) {
						if (typeof data.data[i] !== 'undefined' ) {
						
							$("#instagram").append
							("<div class='instagram-wrap' id='pic-"+ data.data[i].id +
							"' ><a target='_blank' href='" + data.data[i].link +
							"'><span class='likes'>"+data.data[i].likes.count +
							"</span><img class='instagram-image' src='" + data.data[i].images.low_resolution.url +
							"' /></a></div>"
						);  
					}  
	      		}     
		  			  	
		  		
		  		$("#showMore").hide();
		  		
				if (typeof next_url === 'undefined' || next_url.length < 10 ) {
			  		$("#showMore").hide();
			  		$( "#more" ).attr( "next_url", "");
		  		}
		  		
		  		
	      		else {
						$("#showMore").show();
						$( "#more" ).attr( "next_url", next_url);
						last_url = next_url;
		      		}
	        }
	    });
	});
}

	
$( document ).ready(function() {
	$("#showMore").hide();
	$("button").click(function(){
		$("#text").hide();
		$("#showMore").show();
		hashtag = document.getElementById('hash').value;
		start_url = "https://api.instagram.com/v1/tags/"+hashtag+"/media/recent/?access_token="+access_token;
		
		$("#more" ).click(function() {  
		var next_url = $(this).attr('next_url');
		load(next_url);
		return false;
		});

		load(start_url);
		});
});


</script>
</head>
<body>

	<h1>HashPitcha helps you to search pictures on instagram by calling out their hashtags.</h1>
	<br/>
	<br/>
	<h1>INSTAGRAM - Yeh Boy! </h1>
	<br />


  <h2><i>Enter your hashtag # </i>
  <input type="text" id="hash" /><span> <span>
  <button>submit</button>

    
	<div>
		<h2 id="text"><i>Please enter the hashtag and click "submit" button to search images.</i></h2>
		<div id="instagram"></div>
		<div class='clearfix'></div>
		<div id="showMore">
			<div class='clearfix '><a id='more' next_url='"+next_url+"' href='#'>[Load More]</a></div>		
		</div>
	</div>
</body>
</html>

