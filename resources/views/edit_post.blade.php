    <?php
        if(isset($data_to_edit)){
            //print_r($data_to_edit);
            $post_id_hidden = $data_to_edit[0]->id;
            $title_to_edit = $data_to_edit[0]->blogtitle;
            $content_to_edit = $data_to_edit[0]->blogcontent;
        }else{
            $post_id_hidden = "";
            $title_to_edit = "";
            $content_to_edit = "";
        }
    ?>    
        <div id="form_box">
            <form action="/postupdate" method="put">
                <input type="hidden" name="post_id_hidden" value="<?php echo $post_id_hidden;?>"/>
                <input placeholder="Enter the title" value="<?php echo $title_to_edit;?>" type="text" name="post_title">
                <br />
                <textarea name="post_content" id="myEditor" placeholder="Enter the title">
                <?php echo $content_to_edit;?>
                </textarea>
                <button type="submit" class="buttons" id="submit" name="submit">Update</button>
            </form>
            
        </div>

        <script>
            ClassicEditor
            .create( document.querySelector( '#myEditor' ) )
            .catch( error => {
            console.error( error );
            } );
        </script>
    </body>
</html>
