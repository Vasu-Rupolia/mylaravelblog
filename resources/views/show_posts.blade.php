<?php
    function toNormalDate($date){
        $newDate = "";
        $newDateParts = explode("-", $date);
        $newDate .= $newDateParts[2] . "-" . $newDateParts[1] . "-" . $newDateParts[0];
        return $newDate;
    }
?>
        
        <div id="posts_box">
            <?php 
            foreach($my as $m){
                $created_at = explode(" ", $m->created_at)[0];
                echo "<h2><a class='blog_post_link' href='/post/".$m->id."'>" . $m->blogtitle . "</a></h2>";
                echo "<small>Posted on: ".toNormalDate($created_at)."</small>";
                echo "<p>" . $m->blogcontent . "</p>";
                //echo "<a href='/update_post/".$m->id."' class='update_button buttons'>Update</a>";
                echo "&nbsp;&nbsp";
                //echo "<a href='#' onclick = 'delete_confirmation(".$m->id.");' class='delete_button buttons'>Delete</a>";
                echo "<br /><br />";
                echo "<hr>";
            }?>
            
        </div>
    </body>

    <script>
        function delete_confirmation(id){
            var conformation = confirm("Are you sure you want to delete this?");
            if(conformation){
                window.location.href = "/delete_post/"+id;
            }
        }
    </script>
</html>
