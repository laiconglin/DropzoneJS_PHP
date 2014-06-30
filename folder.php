<html>
<body>
    <input type="file" id="files" name="files[]" multiple webkitdirectory directory/>
    <div id="output"></div>

<script>
var input = document.getElementById('files');
var output = document.getElementById('output');

input.onchange = function(e) {
    output.innerText = "";
    var files = e.target.files; // FileList
    uploadFiles(files);
    for (var i = 0, f; f = files[i]; ++i){
        console.debug(files[i].webkitRelativePath);
        output.innerText  = output.innerText + files[i].webkitRelativePath+"\n";
    }
}

function uploadFiles(files){
    // Loop through the file list
    for (var i in files){
        if(files[i].type== "" && files[i].name == ".") {
            continue;
        }

        //upload a single file
        // Create a new HTTP requests, Form data item (data we will send to the server) and an empty string for the file paths.
        xhr = new XMLHttpRequest();
        data = new FormData();
        var path = "";

        // Set how to handle the response text from the server
        xhr.onreadystatechange = function(ev){
            //console.log(xhr.responseText);
        };
        // Append the current file path to the paths variable (delimited by tripple hash signs - ###)
        path = files[i].webkitRelativePath;
        // Append current file to our FormData with the index of i
        data.append(i, files[i]);

        data.append('path', path);

        // Append the paths variable to our FormData to be sent to the server
        // Currently, As far as I know, HTTP requests do not natively carry the path data
        // So we must add it to the request manually.
        // Open and send HHTP requests to upload.php
        xhr.open('POST', "folder_upload.php", true);
        xhr.send(this.data);
    };
}

</script>
</body>
</html>
