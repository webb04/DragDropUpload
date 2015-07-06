<!DOCTYPE html>
<html>
	<head>
		<title>Drag & Drop Uploading</title>
	</head>
	<body>
		<style>

		body {
			font-family: 'Arial', sans-serif;
		}

		.dropzone {
			width: 300px;
			height: 300px;
			border: 2px dashed #ccc;
			color: #ccc;
			line-height: 300px;
			text-align: center;
		}

		.dropzone.dragover{
			border-color: #000;
			color: #000;
		}

		</style>
		<div id="uploads">
			<div class="alert alert-success alert-dismissible successUpload" role="alert">
 			<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
  			<strong></strong> Successfully Uploaded!
			</div>


		</div>
		<div class="dropzone" id="dropzone">Drop files here to upload</div>

		<script>
			(function() {
				$('.successUpload').hide();
				var dropzone = document.getElementById('dropzone');

				var displayUploads = function(data){
					var uploads = document.getElementById('uploads'),
					anchor,
					x;

					for (x=0; x < data.length; x = x +1) {
						anchor = document.createElement('a');
						anchor.href = data[x].file;
						anchor.innerText = data[x].name;
						uploads.appendChild(anchor);
					}
				}

				var upload = function(files) {
					var formData = new FormData(),
					xhr = new XMLHttpRequest(),
					x;

					for (x = 0; x < files.length; x = x + 1) {
						formData.append('file[]', files[x]);
					}

					xhr.onload = function() {
						$('.successUpload').show();
						var data = JSON.parse(this.responseText);
						$('.successUpload').show();
						displayUploads(data);
					}

					xhr.open('post', 'upload.php');
					xhr.send(formData);
				}

				dropzone.ondrop = function(e) {
					e.preventDefault();
					this.className ='dropzone';
					upload(e.dataTransfer.files);
				};


				dropzone.ondragover = function() {
					this.className = 'dropzone dragover';
					return false;
				};

				dropzone.ondragleave = function() {
					this.className = 'dropzone';
					return false;
				};

			}());
		</script>

	</body>


</html>
