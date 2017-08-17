window.onload = function() { 
var appid="6926bce7";
var appkey="b8785abe440331d224e412c1c3a1ee99";
var random=Math.floor(Math.random() * 1000);

$("#loader").hide();
 $('#btnregister').hide();
   $('#btnlogin').show();


$("#faceuploaddivbutton").click(function (){
   $('#outputphoto').hide();
function userMedia(){
            return navigator.getUserMedia = navigator.getUserMedia ||
            navigator.webkitGetUserMedia ||
            navigator.mozGetUserMedia ||
            navigator.msGetUserMedia || null;

        }


        // Now we can use it
        if( userMedia() ){
            var videoPlaying = false;
            var constraints = {
                video: true,
                audio:false
            };
            var video = document.getElementById('v');

            var media = navigator.getUserMedia(constraints, function(stream){

                // URL Object is different in WebKit
                var url = window.URL || window.webkitURL;

                // create the url and set the source of the video element
                video.src = url ? url.createObjectURL(stream) : stream;

                // Start the video
                video.play();
                videoPlaying  = true;
            }, function(error){
                console.log("ERROR");
                console.log(error);
            });


            // Listen for user click on the "take a photo" button
            $("#takenforgranted").click(function (){

                 if (videoPlaying){
                  
                  event.preventDefault();
                 
                    var canvas = document.getElementById('canvas');
                    canvas.width = video.videoWidth;
                    canvas.height = video.videoHeight;
                    canvas.getContext('2d').drawImage(video, 0, 0);
                    var data2 = canvas.toDataURL('image/jpg');
                    document.getElementById("imagesend").value = data2;
                    document.getElementById('outputphoto').setAttribute('src', data2);
                    alert("Image has been Captured");
                     $('#v').hide();
                    $('#outputphoto').show();
                     
                     $('#takenforgranted').hide();
                event.preventDefault();
                 }
            });
        }

 else {
            console.log("KO");
        }
});



var methods_test = methods_test || {}

methods_test = {
    init: function () {
      $("#apiMethodsTests").hide();
      this.setActions();
    },
    setActions: function () {
      	var self = this;
      	$(document).ready(function () {
      		$("#loader").show();
      		if ($("#app_id").val() != "" && $("#app_key").val() != "") {
            	self.kairos = new Kairos(appid, appkey);
              	self.kairos.checkAuthentication(function(cb){
              		if (cb.statusText != "error") {
              			$("#loader").hide();
                    $("#apiMethodsTests").show();
              		}
              		else {
              			$("#loader").hide();
              			$("#apiMethodsTests").hide();
                    $("#authenticationError").html("Authentication Error");
              		}
              	});
            }
            else {
            	$("#loader").hide();
           		$("#apiMethodsTests").hide();
          		$("#authenticationError").html("Plese enter your API keys")
            }
    	});
      	$("#testViewGalleries").click(function () {
          self.startTimer();
      		$("#loader").show();
      		$("#view_data").empty();
            self.kairos.viewGalleries(self.success_cb);
        });
        $("#testEnroll").click(function () {
            $('#textEnroll').text('Uploading');
           $('#testEnroll').addClass('running');
          var ad=document.getElementById("aadharnumber").value;
          document.getElementById("randomno").value = ad;
          document.getElementById("subjectid").value = ad;
        	$("#view_data").empty();
        	if (self.validateMe($("#enrollForm")) == true) {
            self.startTimer();
            $("#loader").show();
            gallery_name = $("#enrollForm .gallery_name").val();
            subject_id = $("#enrollForm .subject_id").val();
            if($("#enrollForm .image-upload").val() != "") {
              var file = $('#enrollForm .image-upload')[0].files[0]; 
              var reader  = new FileReader();
              reader.readAsDataURL(file);
              reader.onloadend = function () {
                var fileData = parseImageData(reader.result);
                self.kairos.enroll(fileData, gallery_name, subject_id, self.success_cb);

              }
            }
            else {
              image = $("#enrollForm .image").val();
              self.kairos.enroll(image, gallery_name, subject_id, self.success_cb);
            }
          }
        });

        $("#testViewSubjectsInGallery").click(function () {
        	$("#view_data").empty();
        	if (self.validateMe($("#viewSubjectsInGalleryForm input")) == true) {
            self.startTimer();
        		$("#loader").show();
            	var gallery_name = $("#viewSubjectsInGalleryForm .gallery_name").val();
            	self.kairos.viewSubjectsInGallery(gallery_name, self.success_cb);
        	}
        });

        $("#testRemoveSubjectFromGallery").click(function () {
        	$("#view_data").empty();
        	if (self.validateMe($("#removeSubjectFromGalleryForm input")) == true) {
            self.startTimer();
        		$("#loader").show();
            	var subject_id = $("#removeSubjectFromGalleryForm .subject_id").val();
            	var gallery_name = $("#removeSubjectFromGalleryForm .gallery_name").val();
                self.kairos.removeSubjectFromGallery(subject_id, gallery_name, self.success_cb);
        	}
        });

        $("#testRemoveGallery").click(function () {
        	$("#view_data").empty();
        	if (self.validateMe($("#removeGalleryForm input")) == true) {
            self.startTimer();
        		$("#loader").show();
            	var gallery_name = $("#removeGalleryForm .gallery_name").val();
                self.kairos.removeGallery(gallery_name, self.success_cb);
        	}
        });

        $("#testRecognize").click(function () {
           $('#textRecognize').text('Verifying');
           $('#testRecognize').addClass('running');
          var ad=document.getElementById("aadharnumber").value;
           document.getElementById("randomno").value = ad;
        	$("#view_data").empty();
        	if (self.validateMe($("#recognizeForm")) == true) {
            self.startTimer();
            $("#loader").show();
            gallery_name = $("#recognizeForm .gallery_name").val();
            if($("#recognizeForm .image-upload").val() != "") {
              var file = $('#recognizeForm .image-upload')[0].files[0]; 
              var reader  = new FileReader();
              reader.readAsDataURL(file);
              reader.onloadend = function () {
                var fileData = parseImageData(reader.result);
                self.kairos.recognize(fileData, gallery_name, self.success_cb);
              }
            }
            else {
              image = $("#recognizeForm .image").val();
              self.kairos.recognize(image, gallery_name, self.success_cb);
            }
          }
        });

        $("#testDetect").click(function () {
        	$("#view_data").empty();
        	if (self.validateMe($("#detectForm")) == true) {
            self.startTimer();
            $("#loader").show();
            if($("#detectForm .image-upload").val() != "") {
              var file = $('#detectForm .image-upload')[0].files[0]; 
              var reader  = new FileReader();
              reader.readAsDataURL(file);
              reader.onloadend = function () {
                var fileData = parseImageData(reader.result);
                self.kairos.detect(fileData, self.success_cb);
              }
            }
            else {
              image = $("#detectForm .image").val();
              self.kairos.detect(image, self.success_cb);
            }
          }
        });	

   

      $("#testVerify").click(function () {
        $("#view_data").empty();
        if (self.validateMe($("#verifyForm")) == true) {
          self.startTimer();
          $("#loader").show();
          gallery_name = $("#verifyForm .gallery_name").val();
          subject_id = $("#verifyForm .subject_id").val();
          if($("#verifyForm .image-upload").val() != "") {
            var file = $('#verifyForm .image-upload')[0].files[0]; 
            var reader  = new FileReader();
            reader.readAsDataURL(file);
            reader.onloadend = function () {
              var fileData = parseImageData(reader.result);
              self.kairos.verify(fileData, gallery_name, subject_id, self.success_cb);
            }
          }
          else {
            image = $("#verifyForm .image").val();
            self.kairos.verify(image, gallery_name, subject_id, self.success_cb);
          }
        }
      });
    },
    validateMe: function(obj) {
      var isValid = true;
      errorAlert = "";
      var fileUploaded = false;
      if(obj.find(".image-upload").val() != "") {
        fileUploaded = true;
      }
      obj.find("input").each(function () {
        if($(this).attr("type") == "text" && !$(this).hasClass("image")) {
          if($(this).val() == "") {
            isValid = false;
            errorAlert = errorAlert + "Please enter a value for " + $(this).attr("name") + "\n";
          }
        }
        if($(this).hasClass("image")) {
          if($(this).val() == "" && !fileUploaded) {
            isValid = false;
            errorAlert = errorAlert + "Please either enter an image URL or image base64 data, or upload an image" + "\n";
          }
          if($(this).val() != "" && fileUploaded) {
            isValid = false;
            $(this).val("");
            $("input:file").val("");
            errorAlert = errorAlert + "You cannot enter an image URL or image base64 data AND upload an image.  Please do one or the other." + "\n";
          }
        }
      });
      if (isValid == false) {
        alert(errorAlert)
      }
      return isValid;
    },
    success_cb: function(data){
      clearInterval(self.timer);
      $("#view_data").empty();
      $("#view_data").html(data.responseText);
      obj = JSON.parse(data.responseText);
      console.log(obj);
      alert(obj);
      if(obj.images[0].transaction.status=="success"&&obj.images[0].attributes=="[object Object]")
        {
      alert("Face is Uploaded Successfully");
      $('#testEnroll').addClass('success');
         $('#textEnroll').text('Uploaded');
         $('#testEnroll').removeClass('running');
      document.getElementById("testEnroll").value ="Uploaded";
       $('#btnregister').show();
        $('#faceuploaddivbutton').hide();
        }
        
      if(obj.images[0].transaction.status=="success"&&obj.images[0].attributes!="[object Object]"){
      alert("Face is Verified");
      $('#testRecognize').removeClass('running');
         $('#testRecognize').addClass('success');
         $('#textRecognize').text('Verified');
      document.getElementById("testRecognize").value ="Verified";
       $('#btnlogin').show();
	    $('#faceuploaddivbutton').hide();
    }
    
   
    
      $("#loader").hide();
      
  	},
    startTimer: function() {
      $(".timer").html("");
      var currTime = 0;
      self.timer = setInterval(function(){
        currTime ++;
        $("#timer").html(currTime + " sec");
      },1000);
    }
    
}
var parseImageData = function(imageData) {
    imageData = imageData.replace("data:image/jpeg;base64,", "");
    imageData = imageData.replace("data:image/jpg;base64,", "");
    imageData = imageData.replace("data:image/png;base64,", "");
    imageData = imageData.replace("data:image/gif;base64,", "");
    imageData = imageData.replace("data:image/bmp;base64,", "");
    return imageData;
}
$(function () {
  methods_test.init()
});

 };