/*
TODO: да преместя всичките работи за промяна в една функция
*/

 $(document).ready(function(){
	 $("body").delegate(".tog", "click", function(e){
e.preventDefault();

$("#a"+$(this).attr("id")).css("padding","0");
	$("#a"+$(this).attr("id")).animate({
    /*opacity: 0.25,
    left: '+=50',*/
    height: 'toggle',
	padding: '0'
  }, 100, function() {
    // Animation complete.
  });
	 });

 
 
 
 
$("body").delegate("#saveStu", "click", function(e){
e.preventDefault();
		var newname = $("#name").val();
		var newegn = $("#egn").val();
		var newNomerVklas = $("#nomer").val();
		var newsnimka = $("#snimka").val();
		var newClassID = $("#class").val();
		var email = $("#email").val();
		var address = $("#address").val();
		var uid = $("#uid").val();
//alert("name="+newname + "&egn=" + newegn + "&nomer=" + newNomerVklas + "&snimka=" + newsnimka + "&class=" + newClassID + "&email=" + email + "&address=" + address);
		$.ajax({
			type: "POST",
			url: "process.php?do=saveStu",
			data: "uid="+ uid +"&name="+newname + "&egn=" + newegn + "&nomer=" + newNomerVklas + "&snimka=" + newsnimka + "&class=" + newClassID + "&email=" + email + "&address=" + address,
			success: function(msg){
			//alert(msg);
				serror(msg);		
				location.href = "editUser.php?w=stu&id="+uid+"&message=1";
			
			}
					 });
});

	  
	$("body").delegate("#add", "click", function(e){
		e.preventDefault();

		var text = $("#txt").val();
		var name = $("#name").val();
		var egn = $("#egn").val();
		var nomerVklas = $("#nomerVklas").val();
		var snimka = $("#snimka").val();
		var status = $("#status").val();
		var pass = $("#pass").val();
		var classID = $("#classID").val();
		var role = $("#role").val();
		var email = $("#email").val();
		var address = $("#address").val();
		//alert("author="+author + "&song=" + song + "&text=" +text + "&videolink="+videolink+"&category="+cat+"&level="+lvl);
		$.ajax({
			type: "POST",
			url: "process.php?do=add",
			data: "&name=" + name +"&pass=" + pass + "&egn=" + egn +	"&nomerVklas=" + nomerVklas + "&snimka=" + snimka + "&role="+role + "&status="+status+"&classID="+classID + "&email=" + email + "&address=" + address,
			success: function(msg){
				serror(msg);
				if(msg == "ok"){
				location.href = "?do=add&w=student&message=2";
				}
			}
					 });
});




$("body").delegate("#delNews", "click", function(e){
e.preventDefault();

		var id = $(this).attr("href");
		
		var t = confirm("Наистина ли искате да изтриете новината?");
		
		if(t){
		$.ajax({
			type: "POST",
			url: "process.php?do=delNews",
			data: "id="+id ,
			success: function(msg){
			//	serror(msg);
				location.href = "?do=view&w=news&message=0";
			}
					 });
		}//if t
});//del news





$("body").delegate("#delPage", "click", function(e){
e.preventDefault();

		var id = $(this).attr("href");
		
		var t = confirm("Наистина ли искате да изтриете страницата?");
		
		if(t){
		$.ajax({
			type: "POST",
			url: "process.php?do=delPage",
			data: "id="+id ,
			success: function(msg){
			//	serror(msg);
				location.href = "?do=view&w=pages&message=0";
			}
					 });
		}//if t
});//del page




$("body").delegate("#delSubj", "click", function(e){
e.preventDefault();

		var id = $(this).attr("href");
		
		var t = confirm("Наистина ли искате да изтриете предмета?");
		
		if(t){
		$.ajax({
			type: "POST",
			url: "process.php?do=delSubj",
			data: "id="+id ,
			success: function(msg){
				if(msg == "ok"){
				serror(msg);
				location.href = "?do=view&w=subjs&message=0";
				}else{serror("Something went wrong! Try again." + msg);location.href = "?do=view&w=subjs&message=0";}
			}
					 });
		}//if t
});//del subjs



/*** tooltips ***/

//Select all anchor tag with rel set to tooltip
	$('a[rel=tooltip]').mouseover(function(e) {
		
		//Grab the title attribute's value and assign it to a variable
		var tip = $(this).attr('title');	
		
		//Remove the title attribute's to avoid the native tooltip from the browser
		//$(this).attr('title','');
		
		//Append the tooltip template and its value
		$(this).append('<div id="tooltip"><div class="tipHeader"></div><div class="tipBody">' + tip + '</div><div class="tipFooter"></div></div>');		
				
		//Show the tooltip with faceIn effect
		$('#tooltip').fadeIn('500');
		$('#tooltip').fadeTo('10',0.9);
		
	}).mousemove(function(e) {
	
		//Keep changing the X and Y axis for the tooltip, thus, the tooltip move along with the mouse
		$('#tooltip').css('top', e.pageY + 10 );
		$('#tooltip').css('left', e.pageX + 20 );
		
	}).mouseout(function() {
	
		//Put back the title attribute's value
		//$(this).attr('title',$('.tipBody').html());
	
		//Remove the appended tooltip template
		$(this).children('div#tooltip').remove();
		
	});
/*** tooltips ***/


/*** otsastv ***/

$("body").delegate("#addAbs", "click", function(e){
e.preventDefault();
//alert('a');

	var id = "#dialog";
	//pr=$(this).attr("name"); // predmetID
	uid = $(this).attr("href");
		$("#dialog").load("addAbs.php");
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
		$(id).css('top',  winH/2)//-$(id).height()/2);
		$(id).css('left', winW/2-$(id).width()/2);
	
		//transition effect
		$(id).fadeIn("fast"); 
});


$("body").delegate("#addo", "click", function(e){ 
e.preventDefault();

		var type = $("#type").val();
		var predmetID = -9;//$("#predmetID").val();
		var opisanie = $("#opisanie").val();
		var uchenikID = $("#uid").val();
		//alert("type="+type + "&predmetID=" + predmetID + "&opisanie=" + opisanie + "&uchenikID=" + uid);
		$.ajax({
			type: "POST",
			url: "process.php?do=addAbs",
			data: "type="+type + "&predmetID=" + predmetID + "&opisanie=" + opisanie + "&uchenikID=" + uchenikID,
			success: function(msg){
				if(msg !=0){
				serror(msg);		
				$('#mask').fadeOut("fast");
				$('.window').fadeOut("fast");
				location.href = "editUser.php?w=stu&id="+uid+"&message=0";
				}else{alert("Грешка! "+ msg);}
			}
					 });
});








$("body").delegate("#delAbs", "click", function(e){
e.preventDefault();

		var id = $(this).attr("href");
		
		var t = confirm("Наистина ли искате да изтриете отсъствието?");
		
		if(t){
		$.ajax({
			type: "POST",
			url: "process.php?do=delAbs",
			data: "id="+id ,
			success: function(msg){
				if(msg == "ok"){
				serror(msg);
				location.href = "editUser.php?w=stu&id="+uid+"&message=0";
				}else{serror("Something went wrong! Try again." + msg);location.href = "editUser.php?w=stu&id="+uid+"&message=0";}
			}
					 });
		}//if t
});//del




$("body").delegate("#chAbs", "click", function(e){
e.preventDefault();

		var id = $(this).attr("href");
		
		//var t = confirm("Наистина ли искате да одобрите този потребител?");
		
		//if(t){
		$.ajax({
			type: "POST",
			url: "process.php?do=chAbs",
			data: "id="+id ,
			success: function(msg){
				if(msg == "ok"){
				serror(msg);
				location.href = "editUser.php?w=stu&id="+uid+"&message=0";
				}else{serror("Something went wrong! Try again." + msg);location.href = "editUser.php?w=stu&id="+uid+"&message=0";}
			}
					 });
		//}//if t
});
/*** otsastv ***/










/*** notes ***/
var userID;
$("body").delegate("#addNotes", "click", function(e){
e.preventDefault();
//alert('a');

	var id = "#dialog";
	//pr=$(this).attr("name"); // predmetID
	uid = $(this).attr("href");
	userID = $(this).attr("rel");
		$("#dialog").load("addNote.php");
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
		$(id).css('top',  winH/2)//-$(id).height()/2);
		$(id).css('left', winW/2-$(id).width()/2);
	
		//transition effect
		$(id).fadeIn("fast"); 
});


$("body").delegate("#addn", "click", function(e){ 
e.preventDefault();

		var note = $("#note").val();
		userID = $("#addNotes").attr("rel");
		//var predmetID = -9;//$("#predmetID").val();
		//var opisanie = $("#opisanie").val();
		var uchenikID = uid;//$("#uid").val();
		var predmetID = $("#predmetID").val();
		//alert("type="+type + "&predmetID=" + predmetID + "&opisanie=" + opisanie + "&uchenikID=" + uid);
		$.ajax({
			type: "POST",
			url: "process.php?do=addNotes",
			data: "note="+note + "&predmetID=" + predmetID + "&uchenikID=" + uchenikID + "&userID=" + userID,
			success: function(msg){
				if(msg !=0){
				serror(msg);		
				$('#mask').fadeOut("fast");
				$('.window').fadeOut("fast");
				location.href = "editUser.php?w=stu&id="+uid+"&message=0";
				}else{alert("Грешка! "+ msg);}
			}
					 });
});








$("body").delegate("#delNote", "click", function(e){
e.preventDefault();

		var id = $(this).attr("href");
		
		var t = confirm("Наистина ли искате да изтриете забележката?");
		
		if(t){
		$.ajax({
			type: "POST",
			url: "process.php?do=delNote",
			data: "id="+id ,
			success: function(msg){
				if(msg == "ok"){
				serror(msg);
				location.href = "editUser.php?w=stu&id="+uid+"&message=0";
				}else{serror("Something went wrong! Try again." + msg);location.href = "editUser.php?w=stu&id="+uid+"&message=0";}
			}
					 });
		}//if t
});//del notes


/*** notes ***/






$("body").delegate("#delUser", "click", function(e){
e.preventDefault();
//$("#msg").html(">>");
//$("#messages").html("add?");
		var id = $(this).attr("href");
		
		var t = confirm("Наистина ли искате да изтриете този потребител?");
		
		if(t){
		$.ajax({
			type: "POST",
			url: "process.php?do=delUser",
			data: "id="+id ,
			success: function(msg){
				serror(msg);
				getA();
				location.reload();
			}
					 });
		}//if t
});
$("body").delegate("#delStudent", "click", function(e){
e.preventDefault();
//$("#msg").html(">>");
//$("#messages").html("add?");
		var id = $(this).attr("href");
		
		var t = confirm("Наистина ли искате да изтриете този потребител?");
		
		if(t){
		$.ajax({
			type: "POST",
			url: "process.php?do=delStudent",
			data: "id="+id ,
			success: function(msg){
				serror(msg);
				getA();
				location.reload();

			}
					 });
		}//if t
});

$("body").delegate("#delParent", "click", function(e){
e.preventDefault();
//$("#msg").html(">>");
//$("#messages").html("add?");
		var id = $(this).attr("href");
		
		var t = confirm("Наистина ли искате да изтриете този потребител?");
		
		if(t){
		$.ajax({
			type: "POST",
			url: "process.php?do=delParent",
			data: "id="+id ,
			success: function(msg){
				serror(msg);
				getA();
				location.reload();

			}
					 });
		}//if t
});


$("body").delegate("#delClass", "click", function(e){
e.preventDefault();
		var id = $(this).attr("href");
		var t = confirm("really dell class?");
		
		if(t){
		$.ajax({
			type: "POST",
			url: "process.php?do=delClass",
			data: "id="+id ,
			success: function(msg){
				serror(msg);
				getC();
			}
					 });
		}
});




$("body").delegate("#apprP", "click", function(e){
e.preventDefault();
		var id = $(this).attr("href");
		//var t = confirm("Наистина ли искате да одобрите този потребител?");
		//if(t){
		$.ajax({
			type: "POST",
			url: "process.php?do=apprP",
			data: "id="+id ,
			success: function(msg){
				if(msg == "ok"){
				serror(msg);
				//location.href = "editUser.php?w=stu&id="+uid+"&message=0";
				location.href = "?do=view&w=parents";
				}else{serror("Something went wrong! Try again." + msg);location.href = "?do=view&w=parents";}
			}
					 });
		//}//if t
});//appr







$("body").delegate("#unapprP", "click", function(e){
e.preventDefault();

		var id = $(this).attr("href");
		
		//var t = confirm("Наистина ли искате да одобрите този потребител?");
		
		//if(t){
		$.ajax({
			type: "POST",
			url: "process.php?do=unapprP",
			data: "id="+id ,
			success: function(msg){
				if(msg == "ok"){
				serror(msg);
				//location.href = "editUser.php?w=stu&id="+uid+"&message=0";
				location.href = "?do=view&w=parents";
				}else{serror("Something went wrong! Try again." + msg);location.href = "?do=view&w=parents";}
			}
					 });
		//}//if t
});//appr




$("body").delegate("#gra", "click", function(e){
e.preventDefault();

		var id = $(this).attr("href");
		var value;
		
		$.ajax({
			type: "POST",
			url: "process.php?do=getGr",
			data: "id="+id ,
			success: function(msg){

				value = msg;
				$("#editGrade").html('<b>Редактиране на оценка</b><br><form method="post" action="">'+
				'<input type="text" name="grade" id="grade" value="'+value+'">'+
				'<input type="submit" name="saveGrade" id="saveGr" rel = '+id+' value="Запази оценката">'+
				'<br /><a id="delGrade" style="background:red;color:white;font-size:60%" href='+id+'>\[изтриване]</a></form>');
				$("#editGrade").show();
					//		alert(value);
				}//success	
		});
			

});//gradedit


$("body").delegate("#saveGr", "click", function(e){
e.preventDefault();
var id = $("#saveGr").attr("rel");
var val = $("#grade").attr("value");
$.ajax({
			type: "POST",
			url: "process.php?do=saveGr",
			data: "id="+id + "&val=" + val,
			success: function(msg){
				if(msg == "ok"){
				serror(msg);
 				location.href = location.href;
				}else{serror("Something went wrong! Try again." + msg);//location.href = location.href;
				
				}
			}
			
					 });
});

$("body").delegate("#delGrade", "click", function(e){
e.preventDefault();

		var id = $(this).attr("href");
		
		var t = confirm("Наистина ли искате да изтриете оценката?");
		
		if(t){
		$.ajax({
			type: "POST",
			url: "process.php?do=delGr",
			data: "id="+id ,
			success: function(msg){
				if(msg == "ok"){
				serror(msg);
				location.href = location.href;
				}else{serror("Something went wrong! Try again." + msg);location.href = location.href;}
			}
					 });
		}//if t
});//del grade










$('#headcolor').ColorPicker({
	onSubmit: function(hsb, hex, rgb, el) {
		$(el).val(hex);
		$(el).ColorPickerHide();
	},
	onBeforeShow: function () {
		$(this).ColorPickerSetColor(this.value);
	}
})
.bind('keyup', function(){
	$(this).ColorPickerSetColor(this.value);
});



$('#headfgcolor').ColorPicker({
	onSubmit: function(hsb, hex, rgb, el) {
		$(el).val(hex);
		$(el).ColorPickerHide();
	},
	onBeforeShow: function () {
		$(this).ColorPickerSetColor(this.value);
	}
})
.bind('keyup', function(){
	$(this).ColorPickerSetColor(this.value);
});



$("body").delegate(".rmStu", "click", function(e){
e.preventDefault();
var id = $(this).attr("href");
var all = $(this).attr("rel");
var rid = $(this).attr("id");
//alert("id="+id + "&all=" + all +"&rid=" + rid);
$.ajax({
	type: "POST",
	url: "process.php?do=rmStu",
	data: "id="+id + "&all=" + all +"&rid=" + rid,
	success: function(msg){
		if(msg == "ok"){
		serror(msg);
 		location.href = location.href;
		}else{serror("Something went wrong! Try again." + msg);//location.href = location.href;
	
		}
	}

	});
});//rmStu


$("body").delegate(".addS", "click", function(e){
e.preventDefault();
$("#addSdiv").show();
});//rmStu

$("body").delegate("#closeAddS", "click", function(e){
e.preventDefault();
$("#addSdiv").hide();
});

$("body").delegate(".doAddS", "click", function(e){
e.preventDefault();
var id = $(this).attr("id");
var all = $(this).attr("href");
var kid = $("#uchenikID").val();
//alert("id="+id + "&all=" + all +"&rid=" + rid);

$.ajax({
	type: "POST",
	url: "process.php?do=addS",
	data: "id="+id + "&all=" + all + "&kid=" + kid,
	success: function(msg){
		if(msg == "ok"){
		serror(msg);
 		location.href = location.href;
		}else{serror("Something went wrong! Try again." + msg);//location.href = location.href;
	
		}
	}

	});
});











});//eo jq


	function actadmlink(id){/*
		$(id).css("background", "black");
		$(id).css("color", "#FFF");	*/
		$(id).css("border-left", "3px solid blue");
		$(id).css("padding-left","10px");	
		$(id).css("background", "#E3E4E3");
		}

	function gol(where){location.href = where;}
	function setID(sid){uid = sid;}
