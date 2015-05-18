<script src="../assets/js/jquery-2.1.1.min.js" type="text/javascript" charset="utf-8"></script> 
          <script type="text/javascript">
              var cctr=1;
              var wctr=1;
              var ictr=1;
              $(document).ready(function(){
                $("#add_casualty").click(function(){
                  cctr+=1;
                  $("#casualtycon").append(
                    '<br id="cb' + cctr +'"><h5 id="ct' + cctr +'">Enter valid casualty info. ' + cctr + ':</h5>'
                    + '<input id="cn' + cctr + '" type="text" name="acasualty_name[]" required="required" class="form-group form-control" placeholder="Name">'
                    + '<input id="ca' + cctr + '" type="number" min="0" name="acasualty_age[]" required="required" class="form-group form-control" placeholder="Age"> '
                    + '<select id="cg' + cctr + '" class="form-group form-control" name="acasualty_gender[]" required="required">'
                    + '<option value="" disabled default selected class="display-none">Gender</option>'
                    + '<option value="M">Male</option>'
                    + '<option value="F">Female</option>'
                    + '</select>'
                    + '<input id="cad' + cctr + '" type="text" name="acasualty_address[]" required="required" class="form-group form-control" placeholder="Address">'
                    + '<select id="cr' + cctr + '" class="form-group form-control" name="acasualty_role[]" required="required">'
                    + '<option value="" disabled default selected class="display-none">Role</option>'
                    + '<option value="1">Victim</option>'
                    + '<option value="2">Suspect</option>'
                    + '<option value="3">N/A</option>'
                    + '</select>'
                    + '<textarea id="cod' + cctr + '" name="acasualty_cause_of_death[]" id="message" required="required" class="form-group form-control" rows="6" placeholder="Cause of Death"></textarea>'
                    );
                });

                $("#rmv_casualty").click(function() {
                    if (cctr != 1) { 
                      $('#cb' + cctr).remove();
                      $('#ct' + cctr).remove();
                      $('#cn' + cctr).remove(); 
                      $('#ca' + cctr).remove();
                      $('#cg' + cctr).remove();
                      $('#cad' + cctr).remove();
                      $('#cr' + cctr).remove();
                      $('#cod' + cctr).remove();
                      cctr -= 1; 
                    }
                });

                $("#add_witness").click(function(){
                  wctr+=1;
                  $("#witnesscon").append(
                    '<br id="wb'+ wctr +'"><h5 id="wt'+ wctr +'">Enter valid witness info. ' + wctr + ':</h5>'
                    + '<input id="wn'+ wctr +'" type="text" name="awitness_name[]" required="required" class="form-group form-control" placeholder="Name">' 
                    + '<input id="wa'+ wctr +'" type="number" min="0" name="awitness_age[]" required="required" class="form-group form-control" placeholder="Age">' 
                    + '<select id="wg'+ wctr +'" class="form-group form-control" name="awitness_gender[]" required="required">'
                    + '<option value="" disabled default selected class="display-none">Gender</option>'
                    + '<option value="M">Male</option>'
                    + '<option value="F">Female</option>'
                    + '</select>'
                    + '<input id="wad'+ wctr +'" type="text" name="awitness_address[]" required="required" class="form-group form-control" placeholder="Address">'
                    );
                });

                $("#rmv_witness").click(function() {
                    if (wctr != 1) { 
                      $('#wb' + wctr).remove();
                      $('#wt' + wctr).remove();
                      $('#wn' + wctr).remove(); 
                      $('#wa' + wctr).remove();
                      $('#wg' + wctr).remove();
                      $('#wad' + wctr).remove();
                      wctr -= 1; 
                    }
                });
            
                $("#add_involved").click(function(){
                  ictr+=1;
                  $("#involvedcon").append(
                    '<br id="ib'+ ictr +'"><h5 id="it'+ ictr +'">Enter valid involved info. ' + ictr + ':</h5>'
                    + '<input id="in'+ ictr +'" type="text" name="ainvolved_name[]" required="required" class="form-group form-control" placeholder="Name">' 
                    + '<input id="ia'+ ictr +'" type="number" min="0" name="ainvolved_age[]" required="required" class="form-group form-control" placeholder="Age">'                          
                    + '<select id="ig'+ ictr +'" class="form-group form-control" name="ainvolved_gender[]" required="required">'
                    + '<option value="" disabled default selected class="display-none">Gender</option>'
                    + '<option value="M">Male</option>'
                    + '<option value="F">Female</option>'
                    + '</select>'
                    + '<input id="iad'+ ictr +'" type="text" name="ainvolved_address[]" required="required" class="form-group form-control" placeholder="Address">' 
                    + '<select id="ir'+ ictr +'" class="form-group form-control" name="ainvolved_role[]" required="required">'
                    + '<option value="" disabled default selected class="display-none">Role</option>'
                    + '<option value="1">Victim</option>'
                    + '<option value="2">Suspect</option>'
                    + '<option value="3">NA</option>' 
                    + '</select>'
                    );
                });

                $("#rmv_involved").click(function() {
                    if (ictr != 1) { 
                      $('#ib' + ictr).remove();
                      $('#it' + ictr).remove();
                      $('#in' + ictr).remove(); 
                      $('#ia' + ictr).remove();
                      $('#ig' + ictr).remove();
                      $('#iad' + ictr).remove();
                      $('#ir' + ictr).remove();
                      ictr -= 1; 
                    }
                });

            });
          </script>