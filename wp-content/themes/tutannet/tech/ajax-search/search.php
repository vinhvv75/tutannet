<div id="search_wrapper" class="is-disabled animated">
	<div class="col-xs-1 col-sm-3 col-md-3 col-lg-3"></div>
	<form method="get" id="searchform" class="col-xs-10 col-sm-6 col-md-6 col-lg-6" action="<?php bloginfo('home'); ?>/">
		<div class="row">
		    <div class="input-group">
		      <span class="input-group-btn">
		        <button id="buttonSearchForm" class="btn btn-default" type="button"><i id="iconSearchForm" class="fa fa-search fa-fw"></i></button>
		      </span>
		      <input type="text" class="form-control" size="18" value="<?php echo wp_specialchars($s, 1); ?>" placeholder="Tìm bài đọc trên ChuaTuTan.net" name="inputSearchForm" id="inputSearchForm" />
		    </div><!-- /input-group -->
		</div><!-- /.row -->	
		<?php if ( function_exists( 'wp_tag_cloud' ) ) : ?>
		<form id="searchtagcloudform" class="row hidden-xs">
			<div id="search_tag_cloud" class="row-fluid">
				<ul>
					<li><?php wp_tag_cloud( 'orderby="count"&smallest=10&largest=10&order="DESC"&number=20' ); ?></li>
				</ul>
			</div>
		</form><!-- Search Tag Cloud Form -->
		<?php endif; ?>	
		<div id="search_tool" class="row">
			<div class="btn-group" role="group" aria-label="...">
			  <button type="button" class="btn btn-default"><span><i class="fa fa-book fa-fw"></i></span><span>Đọc nhiều</span></button>
			  <button type="button" class="btn btn-default"><span><i class="fa fa-bookmark fa-fw"></i></span><span>Nổi bật</span></button>
			  <button type="button" class="btn btn-default" data-toggle="search_close"><span><i class="fa fa-close fa-fw"></i></span><span>Đóng lại</span></button>
			</div>
		</div>	
	</form><!-- Search Form -->		
	<div class="col-xs-1 col-sm-3 col-md-3 col-lg-3"></div>
	
	
</div><!-- #search_wrapper -->

