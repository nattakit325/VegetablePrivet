

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.1/emojionearea.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.1/emojionearea.min.js"></script>
<style type="text/css">
	.container{
		width: 600px;
		margin: 30px auto;

	}
</style>


<div class="container"><textarea  id="mytext" ></textarea></div>

<script >
	$("#mytext").emojioneArea({
		pickerPosition:"right"

	});
	
</script>
