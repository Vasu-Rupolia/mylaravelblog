    
        <div id="form_box">
            <form action="/postinsert" method="POST" enctype="multipart/form-data">
                @csrf
                <input placeholder="Enter the title" value="" type="text" name="post_title">
                <br />
                <textarea name="post_content" id="myEditor" placeholder="Enter the title">
                </textarea>
                <input type="file" name = "blogimage" />
                <!--<input type="file" name="blogimage" required>-->
                <button type="submit" class="buttons" id="submit" name="submit">Submit</button>
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
