<?php include("header.php"); ?>
<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/app.css');?>">> -->
<?php echo $message;?>
<div class="col-md-8 col-md-offset-2">
   
    <div class="well">
    <div class="form-group">
    <h1>Edit Article Content</h1>
    <?php foreach($info as $info):?>
        <form method="post" action="<?php echo base_url();?>gamestalker/update_article/<?php echo $info->C_id;?>">
      
            
        <label>Article Title</label>
        <input id="ATITLE" name="atitle" type="text" class="form-control" maxlength="24" placeholder="Article Title"required value="<?php echo $info->C_title;?>">
      
        <label>Article Type</label>
        <div>
            <?php if($info->C_type==1){
                    $value=1;
                  }else if($info->C_type==2){
                    $value=2;
                  }else{
                    $value=3;
                  }

            ?>
          <select class="form-control-reg" id="ATYPE" name="atype" class="selectpicker" required value="<?php echo $value;?>">
            <option value="1">News</option>
            <option value="2">Review</option>
            <option value="3">Walkthroughs</option>
         </select>
         
        </div>        
        <div >
          <label>Description:</label>
        </div>
        <textarea id="ADESC" name="adesc" class="form-control" rows="3" required><?php echo $info->C_description;?></textarea>
        <button class="btn btn-success"type="submit">Save Changes</button>  

      
        </form>
    <?php endforeach;?>
    </div>
</div>

</div>
<?php include("admfooter.php"); ?>

<script type="text/javascript">
    
    var atype="<?php echo $info->C_type;?>";
    if(atype==1){
        $("select option[value=1]").attr("selected","selected");
    }else if(atype==2){
        $("select option[value='2']").attr("selected","selected");
    }else{
        $("select option[value='3']").attr("selected","selected");
    }

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
