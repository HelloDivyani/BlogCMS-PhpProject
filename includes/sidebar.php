



 <div class="col-sm-3 col-sm-offset-1 blog-sidebar" style="margin-top:150px">
		<div class="sidebar-module">
		
		
		<h4>Search</h4>
		<hr>
				<form  method="get" action="search.php?search=<?php echo $_REQUEST['search']?>" class="form-inline">
				  <div class="form-group">
					
					<input type="text" name="search" class="form-control" id="exampleInputName2" placeholder="User Search" onkeydown="searchq();">
					<br>
					<br>
					<input type="submit" style="margin:10px" name="SearchSubmit" value="Search"/>
				  </div>
				  
				 
				</form>
						
						
		</div>
          <div class="sidebar-module sidebar-module-inset">
            <h4>About</h4>
			<hr>
            <p>BlogBook is website where people share their ideas and knowledge on various topics.</p>
          </div>
		  
		  <div class="sidebar-module">
            <h4>Subscribe</h4>
			<hr>
			
				<form method="post">
				  <div class="form-group">
					
					<input type="text" name="SubscribeName" class="form-control" id="exampleInputSubscriberName" placeholder="Name">
				  </div>
				  <div class="form-group">
				
					<input type="email" name="Subscribeemail" class="form-control" id="exampleInputEmail1" placeholder="Email">
				  </div>
				 
				 
				  <button type="submit" class="btn btn-primary">Subscribe</button>
				</form>
			
			
				
			
			</div>
		  
         
          <div class="sidebar-module">
            <h4>Elsewhere</h4>
			<hr>
            <ol class="list-unstyled">
              <li><a href="#">GitHub</a></li>
              <li><a href="#">Twitter</a></li>
              <li><a href="#">Facebook</a></li>
            </ol>
          </div>
        </div><!-- /.blog-sidebar -->
