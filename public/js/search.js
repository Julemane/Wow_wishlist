
function itemChoice(itemName, itemId){
      $("#search").val(itemName);
      $("#itemId").val(itemId);
      $("#send").removeAttr('disabled');
      $("#send").css({"background-color": "white"});

    }

    $(document).ready(function(){
        $('.loader').hide();
        $("#send").attr('disabled','disabled');

        let timeout = null;
        $('#search').keyup(function(){
          $field = $(this);
          $('#result').html('');
          $("#send").attr('disabled','disabled');
          $("#send").css({"background-color": "#f5f5f5"});

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
