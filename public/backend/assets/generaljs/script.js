$(document).ready(function(){
    
  $(document).on('click','#update_photo',function(e){
  e.preventDefault(e);
//when you click on button upload photo first time
//show old_image div but if exist === not repete file or div old_image 
//make if exist
// if(!$('#photo').length){ //if link of photo that in div old_image not found
//     $("#update_photo").hide();

//     $("#cancel_update_photo").show();
//     $("#old_image").html('<br> <input type="file" name="photo" id="photo">');

// }
// this i make it from me to understand it 
//run it after
if($('#photo').exist){  // if photo exit but at once not exist not found so it run else 
    $("#update_photo").hide();
    $("#cancel_update_photo").show();
    $("#old_image").html('<br> <input type="file" name="photo" id="photo">'); // it has display none not need alse to .hide()

}else{
    $("#update_photo").hide();
    $("#cancel_update_photo").show();
    $("#old_image").html('<br> <input type="file" name="photo" id="photo">');

}

//this code that we write this make the same of old code that it above it
return false ;
});
/// if he click cancel we make this action 


$(document).on('click','#cancel_update_photo',function(e){
    e.preventDefault(e);

      $("#cancel_update_photo").hide();
  
      $("#update_photo").show();
      $("#old_image").html('');
  
  

  return false ;
  });


});