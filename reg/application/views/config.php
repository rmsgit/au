<?php
/**
 * Created by PhpStorm.
 * User: Ruwan
 * Date: 1/25/2017
 * Time: 9:49 PM
 */
?>


<script>
/*
    var base_url = "<?php echo base_url() ?>";
    //sessionStorage.clear();
    function open_root(page) {
        $("#page").html("Loading..");
        if(sessionStorage.getItem(page)!=undefined){
            $('#title').html('<h2 class="animated rubberBand" style="text-align: center;">AURORA 2K17</h2>');
           $("#page").html("<div class='animated fadeIn'>"+sessionStorage.getItem(page)+"</div>");

        }else{
            $('#title').html('<h2 class="animated rubberBand" style="text-align: center;">AURORA 2K17</h2>');
            $.ajax({url: base_url + "index.php/home/page/"+page, success: function(result){
                $("#page").html("<div class='animated fadeIn'>"+result+"</div>");
            }});
        }
    }
    function getToken() {
        return sessionStorage.getItem('token');
    }
    function call(path, data, callback) {
        console.log(data);
        $.ajax({
            url: base_url + "index.php/api/"+path,
            method: "POST",
            data:{"data":JSON.stringify(data)},
            success: function(result){
                callback(result.status,result.data);
            }
        });
    }*/
//    function call(path, data, callback) {
//        var http = new XMLHttpRequest();
//        var url = base_url + "index.php/api/"+path;
//        var params = 'data=' +JSON.stringify(data);
//        http.open("POST", url, true);
//
//        // Send the proper header information along with the request
//        //http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//        //http.setRequestHeader("Content-Length", params.length);// all browser wont support Refused to set unsafe header "Content-Length"
//        //http.setRequestHeader("Connection", "close");//Refused to set unsafe header "Connection"
//
//        // Call a function when the state
//        http.onreadystatechange = function() {
//            if(http.readyState == 4 && http.status == 200) {
//                var result = http.response;
//                console.log(result);
//                callback(result.status,result.data);
//            }
//        };
//        http.send(params);
//    }

</script>
