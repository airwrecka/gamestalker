
<div class="container">

<div>
  <label for="body">All Comments</label>
</div>


<label for="body">Post your comment!</label>
  <div>

  </div>

  <form id="myForm" name="myForm" method="post" action="<?php echo base_url();?>gamestalker/view_content_data/<?php echo $info->C_id;?>">
  <div>

          
            <textarea name="content" id="txtarea" cols="20" rows="5"></textarea>
            <button type="submit" onclick="commenter()" >Yasaga magatama</button>
  </div>
  </form>
</div>
<script>
 function commenter(){

 	  $.ajax({
        type: "POST",
        url: 'insertComment.php',
        data: "{" + args + "}",
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        success: onSuccess,
        fail: onFail
    });
 }

</script>