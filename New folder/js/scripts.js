$(document).ready(function() { 
     var dlg=$('#register').dialog({
         title: 'Register for LifeStor',
         resizable: true,
         autoOpen:false,
         modal: true,
         hide: 'fade',
         width:350,
         height:275
      });
      
    
      $('#reg_link').click(function(e) {
          dlg.html('Page loaded');
          e.preventDefault();
          dlg.dialog('open');
      }); 
}); 