
function itemChoice(itemName, itemId){
      $("#search").val(itemName);
      $("#itemId").val(itemId);
      $("#send").removeAttr('disabled');
      $("#send").css({"background-color": "white"});
       $("#send").css({"font-weight": "bold"});

    }

    $(document).ready(function(){
        $('.loader').hide();
        $("#send").attr('disabled','disabled');

        let timeout = null;
        $('#search').keyup(function(){
          $field = $(this);
          $('#result').html('');
          $("#send").attr('disabled','disabled');
          $("#send").css({"background-color": "#d6d1cd"});

          if($field.val().length>1)
          {

            $.ajax({
              type: 'POST',
              url: '../app/controller/Search.php',
              data: 'search='+$("#search").val(),

              beforeSend:function(){
                $('.loader').stop().fadeIn();
              },

              success: function(data){
                $('.loader').fadeOut();
                $('#result').html(data);

              }

            });
          }
        });
      });
