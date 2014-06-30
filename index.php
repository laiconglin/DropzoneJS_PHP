<html>
 
<head>   
 
<!-- 1 -->
<link href="css/dropzone.css" type="text/css" rel="stylesheet" />
 
<!-- 2 -->
<script src="dropzone_lai.js"></script>
 
</head>
 
<body>
<!-- 3 -->
<form action="upload.php" class="dropzone dz-clickable" id="my-dropzone">
    <div class="dz-default dz-message bg-color bg-img font-color">
        <span class="font-color">Drop files here to upload</span>
    </div>
</form>
<script>
  // myDropzone is the configuration for the element that has an id attribute
  // with the value my-dropzone (or myDropzone)
Dropzone.options.myDropzone = {
    init: function() {
        this.on("addedfile", function(file) {
            // Create the remove button
            var removeButton = Dropzone.createElement("<button>Remove file</button>");


            // Capture the Dropzone instance as closure.
            var _this = this;

            // Listen to the click event
            removeButton.addEventListener("click", function(e) {
              // Make sure the button click doesn't submit the form:
              e.preventDefault();
              e.stopPropagation();

              // Remove the file preview.
              _this.removeFile(file);
              // If you want to the delete the file on the server as well,
              // you can do the AJAX request here.
            });

            // Add the button to the file preview element.
            file.previewElement.appendChild(removeButton);
        });
    }
  };
</script>   
</body>
</html>
