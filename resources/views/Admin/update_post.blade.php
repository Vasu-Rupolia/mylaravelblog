		<div id="form_box">
		    <select id="" name="post_id" onchange="sendUpdateREQ(this);">
		    	<option value="">Select Post to edit</option>
		    	<?php
		    	foreach($postdata as $pdata){
		    		?>
		    		<option value="<?php echo $pdata->id;?>"><?php echo $pdata->blogtitle;?></option>
		    		<?php
		    	}
		    	?>	
		    </select><br /><br />
		</div>
		<script>
			function sendUpdateREQ(elem){
				var id = elem.value;
				var url = "/update_post/"+id;
				window.location.href = url;
			}
		</script>
		
	</body>
</html>