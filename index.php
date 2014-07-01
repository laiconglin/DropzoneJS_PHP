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
    uploadMultiple: true,
    init: function() {
        this.on("addedfile", function(file) {
        });
    }
};
</script>   
</body>
</html>
