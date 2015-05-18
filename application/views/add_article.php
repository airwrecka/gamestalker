
<?php include("header.php"); ?>
<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/app.css');?>">> -->

<div class="col-md-8 col-md-offset-2">
  <div class="well">
  <div class="form-group">
    <h1>Create New Article</h1>
    <?php echo form_open_multipart('gamestalker/create_article');?> 

      <label>Article Title</label>
      <input id="ATITLE" name="atitle" type="text" class="form-control" placeholder="Article Title" maxlength="24" required>
      
      <label>Article Type</label>
      <div>
  
        <select id="ATYPE" name="atype" class="selectpicker" required>
          <option value="1">News</option>
          <option value="2">Review</option>
          <option value="3">Walkthroughs</option>
        </select>
          
      </div>        
      <input class="btn btn-default" name="userfile[]" id="userfile" type="file" multiple required/> 
      <div>
        <label>Description:</label>
      </div>
      

      <!--wysiwyg-->
      <div class="wysiwyg-container some-more-class" id="SURROUND">
        <textarea id="ADESC" name="adesc" class="form-control" rows="3"></textarea>  
      </div>
      <!--wysiwyg-->
      
      <button class="btn btn-success"type="submit" value="upload" >Submit</button>
    <?php echo form_close();?>

    
  </div>
</div>

</div>
<?php include("admfooter.php"); ?>

<script type="text/javascript">

  function notifyMe()
  {
    var n="<?php echo $message;?>";

    if(n!="")
    {
      alert(n);
    }
  }
  notifyMe();

</script>

 <script type="text/javascript" src="<?php echo base_url('assets/tinymce/tinymce.min.js') ?>"></script>
<script type="text/javascript">
tinymce.init({
    entity_encoding : "raw",
    relative_urls: false,
    mode : "specific_textareas",
    editor_selector : "form-control",
    plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste",
        "jbimages"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image| link image jbimages"
});
</script>


