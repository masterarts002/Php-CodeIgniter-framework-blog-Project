<div class="row justify-content-center">
	<div class="col-md-10">
        <div class="row">
        	<div class="col-md-8 pt-3">
			<?php include 'adsense_responsive.php'?>
        	<h1 class="text-center">Submit a Guest Post</h1>
        		<h4 class="text-center">Guidelines for Guest Posting at</h4>
        		<h3>Who are our readers?</h3>
        		<p>Our readers are those who want to get information and students who want to learn something.</p>
        		<h3>What are we looking for in a guest post?</h3>
        		<p>The guest posts we are looking for should cover the latest about web development and information about online learning things.</p>
        		<h3>Rules and Regulations:</h3>
        		<ul><li>  Your post must be original. That means it must be written by you and not previously published anywhere else, including your own blog/site.</li>
        
        		<li>  Post should not be about an affiliate program/product or a plug for a company. No reviews please.</li>
        
        		<li>  Very Important: Please don’t submit generic posts on theory, the kind of posts that can be found everywhere else across the web. Your post should not only be informative, but USABLE. Otherwise we will immediately trash your post without warning.
        
                         We desire to provide our readers with information that they can practically and immediately implement in their businesses and website.
        
                         For example, a generic article on the importance of SEO for your blog will be rejected. But a detailed post on how you use Linkbuilding to drive more traffic to your niche blog and the results you’ve seen from it would be a great candidate to be published.
        
                         Original, fresh, unique, authentic, current, relevant to our audience – that’s the kind of content we are looking for.</li>
        
                <li>  We might need to edit the content (misspellings, grammar, formatting etc.) before publishing it.</li>
        
                <li>  We do understand the importance of link love and you should definitely link the article back to your blog. However, We do not tolerate link littering and would not accept links to affiliate products.</li>
        
                <li>  Please attach a few pictures for your post (and include image credits when necessary).</li>
        
                <li>  Please include internal links in your post – good resources, links back to relevant articles on Master Arts, etc.</li>
        
                <li> Posts must be in good English.</li>
        
                <li> Posts should be around or more than 1000 words (exceptions would be posts that have lots of images or video supplement).</li>
        
                <li> It’s imperative that you respond to comments to your published post. The notifications of new comments will be emailed to your email address. The more often you come back to answer the comments, the more discussion you’ll generate, which in turn will encourage more social media sharing, traffic, and exposure.</li></ul>
                <h3>How soon will you know if your article is approved?</h3>
        		<p>We will make sure to read any posts submitted as soon as possible and will most likely let you know within a day or two if we plan on publishing it. This way you’ll know whether you should start submitting your article to other sites.</p>
        		<div class="alert alert-success" id="result">
                   <p><?php echo $this->session->flashdata('message');?></p>
                </div>
				<?php include 'adsense_responsive.php'?>
				<form class="form-horizontal" action="<?php echo base_url('submit-post');?>" method="post"
        			enctype="multipart/form-data">
        			<fieldset>
        
        				<div class="form-group">
        					<label for="fileInput">Guest Post Title</label>
        					<div class="controls">
        						<input class="form-control" name="post_title" id="fileInput" type="text" required/>
        					</div>
        				</div>
        				<div class="from-group">
        					<label for="textarea2">Write Post</label>
        					<div class="controls">
        						<textarea class="ckeditor" id="editor1" name="post_data" required>
                                        </textarea>
        						<script>
        							CKEDITOR.replace('editor1', {
        								extraPlugins: 'codesnippet',
        								codeSnippet_theme: 'monokai_sublime'
        							});
        						</script>
        					</div>
        				</div>
        				<div class="form-group">
        					<label for="fileInput">Guest Post Image</label>
        					<div class="form-controls">
        						<input class="form-controls" name="post_image" id="fileInput" type="file" required/>
        					</div>
        				</div>
        
        
        				<div class="form-group">
        					<label for="fileInput">Author Name</label>
        					<div>
        						<input class="form-control" name="post_author" id="fileInput" type="text" required/>
        					</div>
        				</div>
						
						<div class="form-group">
        					<label for="fileInput">Author Email</label>
        					<div>
        						<input class="form-control" name="post_author_email" id="fileInput" type="email" required/>
        					</div>
        				</div>
        
        				<div class="form-group">
        					<label for="fileInput">Guest Post Category</label>
        					<div>
        						<select class="form-control"  name="post_category" required>
								    <option></option>
        							<?php foreach($all_published_category as $single_category){?>
        							<option value="<?php echo $single_category->category_slug;?>">
        								<?php echo $single_category->category_name;?></option>
        							<?php }?>
        						</select>
        					</div>
        				</div>
        
        				<div class="form-actions">
        					<button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
        				</div>
        			</fieldset>
        		</form>
        
        	</div>
			
		    <div class="col-md-4">
			    <?php include('sidebar.php'); ?>
		    </div>
        </div>	
	</div>	
</div>	
