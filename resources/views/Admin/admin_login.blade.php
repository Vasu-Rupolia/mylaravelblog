        
        <div id="form_box">
            <h2 >
                @if (Session::has('login_failed'))
                    <li>{!! Session::get('login_failed') !!}</li>
                @endif
            </h2>
            <form action="/loginadminC" method="">
                <input placeholder="Enter your username" value="" type="text" name="adminusername">
                <br />
                <input type="password" placeholder="Enter the password" name="adminpassword">
                <button type="submit" class="buttons" id="adminlogin" name="adminlogin">Login</button>
            </form>
            
        </div>
    </body>
</html>
