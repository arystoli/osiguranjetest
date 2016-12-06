<html>
   <head>
      <title>Ajax Example</title>
      
      <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
      </script>
      
      <script>
         function getMessage(){
            $.ajax({
               type:'GET',
               contentType: 'application/json; charset=utf-8',
               url:'https://prodaja.euroherc.hr/ws.ao/api/v1/bankakarticar',
               dataType:'json',
               headers: {
                  'API-Key': 'B4274F11-EE28-48BF-BCB9-925275CD244D',
                  'SessionID': '0ab399a6-d6ea-41b1-804f-3a4b7271ff82'
               },
               success:function(data){
                  $("#msg").html(data.msg);
               }
            });
         }




      </script>
   </head>
   
   <body>
      <div id = 'msg'>This message will be replaced using Ajax. 
         Click the button to replace the message.</div>
      <?php
         echo Form::button('Replace Message',['onClick'=>'getMessage()']);
      ?>
   </body>

</html>