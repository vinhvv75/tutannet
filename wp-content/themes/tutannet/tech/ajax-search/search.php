<?php
function search_init(){	
	
	
}
add_action('init', 'search_init');

?>
<div id="search_wrapper" class="is-disabled animated">
	<form method="get" id="searchform" action="<?php bloginfo('home'); ?>/">
		<div class="row visble-xs is-disabled"></div>
		<div class="row">
		  <div class="col-xs-1 col-sm-3 col-md-4 col-lg-4"></div>
		  <div class="col-xs-10 col-sm-6 col-md-4 col-lg-4">
		    <div class="input-group">
		      <span class="input-group-btn">
		        <button id="buttonSearchForm" class="btn btn-default" type="button"><i id="iconSearchForm" class="fa fa-search fa-fw"></i></button>
		      </span>
		      <input type="text" class="form-control" size="18" value="<?php echo wp_specialchars($s, 1); ?>" placeholder="Tìm bài đọc trên ChuaTuTan.net" name="s" id="s" />
		    </div><!-- /input-group -->
		  </div>
		  <div class="col-xs-1 col-sm-3 col-md-4 col-lg-4"></div>
		</div><!-- /.row -->
	
	</form><!-- Search Form -->
	<form id="searchtagcloudform">
		<div class="row hidden-xs">
			<div id="search_tag_cloud" class="row-fluid">
			<?php if ( function_exists( 'wp_tag_cloud' ) ) : ?>
				<div class="col-xs-2 col-sm-3 col-md-4 col-lg-4"></div>
				<div class="col-xs-8 col-sm-6 col-md-4 col-lg-4">
					<ul>
						<li><?php wp_tag_cloud( 'orderby="count"&smallest=10&largest=10&order="DESC"&number=20' ); ?></li>
					</ul>
				</div>
				<div class="col-xs-2 col-sm-3 col-md-4 col-lg-4"></div>
			<?php endif; ?>
			</div>
		</div>
	</form><!-- Search Tag Cloud Form -->
	
	<div id="search_tool" class="row">
	<div class="col-xs-1 col-sm-3 col-md-4 col-lg-4"></div>
	<div class="col-xs-10 col-sm-6 col-md-4 col-lg-4">
		<div class="btn-group" role="group" aria-label="...">
		  <button type="button" class="btn btn-default"><span><i class="fa fa-book fa-fw"></i></span><span>Đọc nhiều</span></button>
		  <button type="button" class="btn btn-default"><span><i class="fa fa-bookmark fa-fw"></i></span><span>Nổi bật</span></button>
		  <button type="button" class="btn btn-default" data-toggle="search_close"><span><i class="fa fa-close fa-fw"></i></span><span>Đóng lại</span></button>
		</div>
	</div>
	<div class="col-xs-1 col-sm-3 col-md-4 col-lg-4"></div>
	</div>
</div>

