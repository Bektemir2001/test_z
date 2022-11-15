<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>TZ</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container">
		
			<label class="form-label mt-4">Link</label>
			<textarea type="text" name="link" class="form-control mt-2" required autofocus oninvalid="this.setCustomValidity('link is required')"oninput="this.setCustomValidity('')" id="inputValue"></textarea>
			<div class="text-success" id="messageId">
				
			</div>
			<button type="submit" class="btn btn-primary mt-4" onclick="sendLink()">submit</button>
	</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script type="text/javascript">
	function sendLink(){
		var link = document.getElementById('inputValue');
		var message = document.getElementById('messageId');
		
		arr = link.value.split('\n');
		var set = new Set(arr);
		arr = Array.from(set);
		
		message.innerHTML = "";

		if(arr.length){
			for(var i = 0; i < arr.length; i++){
				$.ajax({
					url:"{{route('postLink')}}",
					data:{link:arr[i]},
					success:function(response){
						message.innerHTML += '<p>'+response.link+' => '+response.message+'</p>';

					}
				});
			}
		}
		
	}
	
</script>
</body>
</html>