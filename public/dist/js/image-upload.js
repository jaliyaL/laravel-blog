Dropzone.options.addimages = {
  acceptedFiles: "image/*", // The name that will be used to transfer the file
  maxFilesize: 2, 
  success:function(file,response){
     if(file.status=='success'){
         handleDropZoneFileUpload.handleSuccess(response);
     }else{
         handleDropZoneFileUpload.handleError(response);
     }
  }
};

var handleDropZoneFileUpload = {
     handleError : function(response){
       console.log(response);
     },
     handleSuccess: function(response){
      var img_src = baseUrl + '/gallery/images/' + response.file_name;
      var thumb_img_src = baseUrl + '/gallery/images/thumb/' + response.file_name;
      $('.gallery-image').append('<a href="'+img_src+'" data-lightbox="'+response.file_name+'"><img src="'+thumb_img_src+'"></a>');
     }
};

$(document).ready(function() {
    
});