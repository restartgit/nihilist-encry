        $( document ).ready(function(){
            // ENCRYPT START
            $( "#button" ).click(function() {
                let text = $('#text').val();
                let key = $('#key').val();
                let key2 = $('#key2').val();

                if (text == "" || key == "" || key2 == "") {
                    $("#alert").text("Заполните все поля").fadeIn();
                    return false;
                }
                $.ajax({
                    url: "ajax/encrypt.php",
                    type: "POST",
                    dataType: "html",
                    data: {
                    	"text": text,
                    	"key": key,
                    	"key2": key2
                    },

                    success: function(data){
                       $("#result").show().html(data);
                       $("#alert").hide();
                   }
               });
            });
            // ENCRYPT END

            // DECRYPT START
            $( "#button_decrypt" ).click(function() {
                let text_d = $('#text_decrypt').val();
                let key_d = $('#key_decrypt').val();
                let key2_d = $('#key2_decrypt').val();

                if (text_d == "" || key_d == "" || key2_d == "") {
                    $("#alert_decrypt").text("Заполните все поля").fadeIn();
                    return false;
                }
                $.ajax({
                    url: "ajax/decrypt.php",
                    type: "POST",
                    dataType: "html",
                    data: {
                        "text_d": text_d,
                        "key_d": key_d,
                        "key2_d": key2_d
                    },

                    success: function(data){
                       $("#result_decrypt").show().html(data);
                       $("#alert_decrypt").hide();
                   }
               });
            });
            // DECRYPT END
        });
