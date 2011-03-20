var pr = 0;
var uid;
 $(document).ready(function(){
	 if ($.browser.msie && $.browser.version.substr(0,1) == '6'){
        $('#iesux').show();
	}
	  /* quick and dirty, fix later 
	  	getA();
	  	getC();
		get("Subjs", "#subjs");
	  
	  */
	
	


$("body").delegate("#addClass", "click", function(e){
e.preventDefault();
//$("#messages").html("add?");
		var name = $("#name").val();
		var dolu = $("#dolu").val();
		var gore = $("#gore").val();
		var specialnost = $("#specialnost").val();
		//alert("author="+author + "&song=" + song + "&text=" +text + "&videolink="+videolink+"&category="+cat+"&level="+lvl);
		$.ajax({
			type: "POST",
			url: "process.php?do=addClass",
			data: "name="+name + "&specialnost=" + specialnost + "&dolu=" + dolu + "&gore=" + gore,
			success: function(msg){
				serror(msg);
			}
					 });
});









/*
$("body").delegate("#loginEGN", "click", function(e){
e.preventDefault();
		var egn = $("#egn").val();		
	
		$.ajax({
			type: "POST",
			url: "inc/process.php?do=checkLogin",
			data: "egn="+egn ,
			success: function(msg){
				serror(msg);
				}
					 });
		
});
*/

	
	  
	
	  
	  
	  
	  
	  
	  
	  
	  


	
$("body").delegate("#closeErr", "click", function(e){
e.preventDefault();
$("#msg").hide();
});


$("body").delegate("#serr", "click", function(e){
e.preventDefault();
serror("Грешка, грешка...");
});

$("body").delegate("#spl", "click", function(e){ //spevial link => prevent defaultt
e.preventDefault();
});


$('#mask').click(function () {
		$(this).fadeOut("fast");
		$('.window').fadeOut("fast");
});
$('.window .close').click(function (e) {
		//Cancel the link behavior
		e.preventDefault();
		
		$('#mask').fadeOut("fast");
		$('.window').fadeOut("fast");
	});		


$("body").delegate("#addGrade", "click", function(e){
e.preventDefault();
//alert('a');

	var id = "#dialog";
	pr=$(this).attr("name"); // predmetID
	uid = $(this).attr("href");
		$("#dialog").load("addGrade.php");
		//Get the screen height and width
		var maskHeight = $(document).height();
		var maskWidth = $(window).width();
	
		//Set heigth and width to mask to fill up the whole screen
		$('#mask').css({'width':maskWidth,'height':maskHeight});
		
		//transition effect		
		$('#mask').fadeIn("fast");	
		$('#mask').fadeTo("fast",0.6);	
		
		//Get the window height and width
		var winH = $(window).height();
		var winW = $(window).width();
              
		//Set the popup window to center
		$(id).css('top',  winH/2-$(id).height()/2);
		$(id).css('left', winW/2-$(id).width()/2);
	
		//transition effect
		$(id).fadeIn("fast"); 
});






$("body").delegate("#addg", "click", function(e){ //spevial link => prevent defaultt
e.preventDefault();

		var val = $("#val").val();
		var predmetID = pr;//$("#predmetID").val();
		var opisanie = $("#opisanie").val();
		var uchenikID = uid;
		//alert("author="+author + "&song=" + song + "&text=" +text + "&videolink="+videolink+"&category="+cat+"&level="+lvl);
		//alert("val="+val + "&predmetID=" + predmetID + "&opisanie=" + opisanie + "&uchenikID=" + uchenikID);
		$.ajax({
			type: "POST",
			url: "process.php?do=addGrade",
			data: "val="+val + "&predmetID=" + predmetID + "&opisanie=" + opisanie + "&uchenikID=" + uchenikID,
			success: function(msg){
				if(msg =="err"){
					
					}else{
				serror(msg);		
				$('#mask').fadeOut("fast");
				$('.window').fadeOut("fast");
				location.reload()
				}
			}
					 });
});

		/*** grades ***/
    var g = null ;
    var shown = false;
    $("body").delegate("#gra", "mouseenter", function(e){ 
     	if(shown){
          window.clearTimeout(g);
		delete g;
          }else{
          shown = true;
		  }
    $("#grade").show();
    var c = 1;
	
	$("#grade").html("<div id=\"gr\"><span id=\"cls\">X</span></div>Оценка:"+$(this).text()+"<br>Описание: " + $(this).attr("title") + "<br>Дата:" + $(this).attr("data"));
	
	//getting height and width of the message box
  	var h = $('#grade').height();
	$('#grade').css({left:e.pageX+50+"px",top:e.pageY-(h)+"px"}).show();
    });
    
    
    
    $("body").delegate("#gra", "mouseleave", function(e){ 
		if(shown){
		g = window.setTimeout(function(msg) {$("#chord").hide();shown=false;}, 500);
	}  
	
    });//mouse leave
    
        $("body").delegate("#grade", "mouseover", function(e){ 
		if(shown){
          window.clearTimeout(g);
	delete g;

          }
    });//mouse leave
    $("body").delegate("#grade", "mouseleave", function(e){ 
	if(shown){
		g = window.setTimeout(function(msg) {$("#grade").hide();shown=false;}, 500);
	}  
	
    });//mouse leave
    
    $("body").delegate("#cls", "click", function(e){ 
		$("#grade").hide();
		shown=false;
    });
		/*** grades **/
		
		
		
				  /*** tooltips ***/

	//Select all anchor tag with rel set to tooltip
	$('a[rel=tooltip]').mouseover(function(e) {
		
		//Grab the title attribute's value and assign it to a variable
		var tip = $(this).attr('title');	
		
		//Remove the title attribute's to avoid the native tooltip from the browser
		$(this).attr('title','');
		
		//Append the tooltip template and its value
		//$(this).append('<div id="tooltip"><div class="tipHeader"></div><div class="tipBody">' + tip + '</div><div class="tipFooter"></div></div>');		
		$(this).append('<div id="tooltip"><div class="thdr"></div><div class="tbd">' + tip + '</div><div class="tftr"></div></div>');				
		//Show the tooltip with faceIn effect
		$('#tooltip').fadeIn('500');
		$('#tooltip').fadeTo('10',0.9);
		
	}).mousemove(function(e) {
	
		//Keep changing the X and Y axis for the tooltip, thus, the tooltip move along with the mouse
		$('#tooltip').css('top', e.pageY + 10 );
		$('#tooltip').css('left', e.pageX + 20 );
		
	}).mouseout(function() {
	
		//Put back the title attribute's value
		$(this).attr('title',$('.tbd').html());
	
		//Remove the appended tooltip template
		$(this).children('div#tooltip').remove();
		
	});


/*** tooltips ***/

		
		
		
		
		
}); //eo jq



  
	   function getC(){
			$("#classes").fadeOut("fast");
	  		$.ajax({
  				url: "process.php?do=getClasses",
  				success: function(html){
  				$("#classes").html(html);
				}
		});
			$("#classes").fadeIn("fast");
	  	}
	  
	  
	      function getA(){
			$("#users").fadeOut("fast");
	  		$.ajax({
  				url: "process.php?do=getAll",
  				success: function(html){
  				$("#users").html(html);
				}
		});
			$("#users").fadeIn("fast");
	  	}
		
		
	  
	  function get(what, div){
			$(div).fadeOut("fast");
	  		$.ajax({
  				url: ""+what,
  				success: function(html){
  				$(div).html(html);
				}
		});
			$(div).fadeIn("fast");
	  	}
	  function func (err){
		  $("#msg").hide();
		  $("#msg").fadeIn("400");
		   $("#msg").html("<span align=\"left\" \">"+err+
		   "</span><div align=\"right\" style=\"width:50px;float:right\"><a href=\"\" id=\"closeErr\">X</a></div>"+
		   "");
		  }
		  
		  
			function showGradeInfo(opisanie, date){
				serror(opisanie+" "+date);
				}
	  function serror(err){
		  $("#msg").hide();
		  $("#msg").fadeIn("400");
		   $("#msg").html(err);/*html("<span align=\"left\" \">"+err+
		   "</span><div align=\"right\" style=\"width:50px;float:right\"><a href=\"\" id=\"closeErr\">X</a></div>"+
		   "");*/

		  }
		  
		  
		  
		  
		  
		  $("body").delegate("#grade", "click", function(e){
			  alert("A");
			  $('#msg').dialog({
					autoOpen: false,
					width: 600,
					buttons: {
						"Ok": function() { 
							$(this).dialog("close"); 
						}, 
						"Cancel": function() { 
							$(this).dialog("close"); 
						} 
					}
				});
			  
			  });
		  
		  
		  
		  
  


/**** za kalendara   ******/
var d = new Date();
var month = d.getMonth()+1;

function nextMonth(){month++;calendar();}
function prevMonth(){month--;calendar();}
function today(){var d = new Date(); month = d.getMonth()+1;calendar();}
function calendar(){
			$("#cal").fadeOut("fast");
			$("#cal").fadeIn("fast");
	  		$.ajax({
  				url: "inc/calendar.php?month="+month, //narochno include-va /inc, a ne realative, za da ne se pokazva v /admin i drugite
  				success: function(html){
  				$("#cal").html(html);
				}
		});
 }
 calendar();
 /*za kalendara*/
 
 function where(add){
	 $("#where").html(add);
	 }
	 
	function actlink(id){
		$(id).css("background", "black");
		$(id).css("color", "#FFF");	
		$(id).css("border-bottom", "3px solid blue");	
		}
		
	function actsidebarlink(id){
		$(id).css("background", "#CFCFCF");
		$(id).css("color", "black");	
		}
		
			function gol(where){location.href = where;}
