( function( jQuery ){
wp.customize( 'theme_mods_best-magazine[cc_menu_elem_back_color]', function( value ) {
	
    value.bind( function( to ) {
        style = jQuery('#custom-menu_elem_back_color-css');
        style.remove();
        style = jQuery('\
			<style type="text/css" id="custom-menu_elem_back_color-css">	\
#back h3 a\
{\
	 color:#'+negativeColor(ligthest_brigths(to,10))+'  !important;\
}\
.read_more, #commentform #submit,.reply  ,#menu-button-block ,.top-nav-list.phone   li ul li:hover  > a,.top-nav-list.phone   li ul li  > a:hover, .top-nav-list.phone   li ul li  > a:focus, .top-nav-list.phone   li ul li  > a:active ,.top-nav-list.phone  li.current-menu-ancestor > a:hover, .top-nav-list.phone  li.current-menu-item > a:focus, .top-nav-list.phone  li.current-menu-item > a:active\
{\
	 background-color:'+to+' !important;\
}\
.read_more:hover,#commentform #submit:hover, .reply:hover \
{\
	 background-color:#.'+ligthest_brigths(to,15)+' !important;\
}\
#back \
{\
	 background-color:#.'+ligthest_brigths(to,10)+' !important;\
}\
.blog.bage-news .news-post\
{\
	 border-bottom:1px solid '+to+';\
}\
#sidebar-footer .widget-container ul li:before, aside .sidebar-container ul li:before, .most_categories ul li:before \
{\
	 border-left:solid '+to+';\
}\
#top-nav,.phone #top-nav ul,#reply-title small\
{\
	 background:'+to+';\
}\
.top-nav-list.phone  li.has-sub >  a, .top-nav-list.phone  li.has-sub > a:link, .top-nav-list.phone  li.has-sub >  a:visited ,.top-nav-list.phone  li.has-sub:hover > a,.top-nav-list.phone  li.has-sub > a:hover, .top-nav-list.phone  li.has-sub > a:focus, .top-nav-list.phone  li.has-sub >  a:active \
{\
	 background:'+to+'url('+curent_template_url+'/images/arrow.menu.png) right top no-repeat  !important;\
}\
.top-nav-list.phone  li ul li.has-sub > a, .top-nav-list.phone  li ul li.has-sub > a:link, .top-nav-list.phone  li ul li.has-sub > a:visited\
{\
	 background:'+to+'url('+curent_template_url+'/images/arrow.menu.png) right -18px no-repeat !important;\
}\
.top-nav-list.phone  li ul li.has-sub:hover > a,.top-nav-list.phone  li ul li.has-sub > a:hover, .top-nav-list.phone  li ul li.has-sub > a:focus, .top-nav-list.phone  li ul li.has-sub > a:active \
{\
	 background:#'+ligthest_brigths(to,15)+' url('+curent_template_url+'/images/arrow.menu.png) right -18px no-repeat !important;\
}\
.top-nav-list.phone  li.current-menu-parent > a, .top-nav-list.phone  li.current-menu-parent > a:link, .top-nav-list.phone  li.current-menu-parent > a:visited,.top-nav-list.phone  li.current-menu-parent > a:hover, .top-nav-list.phone  li.current-menu-parent > a:focus, .top-nav-list.phone  li.current-menu-parent > a:active,.top-nav-list.phone  li.has-sub.current-menu-item  > a, .top-nav-list.phone  li.has-sub.current-menu-item > a:link, .top-nav-list.phone  li.has-sub.current-menu-item > a:visited,.top-nav-list.phone  li.has-sub.current-menu-ancestor > a:hover, .top-nav-list.phone  li.has-sub.current-menu-item > a:focus, .top-nav-list.phone  li.has-sub.current-menu-item > a:active,.top-nav-list.phone  li.current-menu-ancestor > a, .top-nav-list.phone  li.current-menu-ancestor > a:link, .top-nav-list.phone  li.current-menu-ancestor > a:visited,.top-nav-list.phone  li.current-menu-ancestor > a:hover, .top-nav-list.phone  li.current-menu-ancestor > a:focus, .top-nav-list.phone  li.current-menu-ancestor > a:active \
{\
	 background:#'+to+' url('+curent_template_url+'/images/arrow.menu.png) right bottom no-repeat !important;\
}\
.top-nav-list.phone  li ul  li.current-menu-item > a, .top-nav-list.phone  li ul  li.current-menu-item > a:link, .top-nav-list.phone  li ul  li.current-menu-item > a:visited,.top-nav-list.phone  li ul  li.current-menu-ancestor > a:hover, .top-nav-list.phone  li ul  li.current-menu-item > a:focus, .top-nav-list.phone  li ul  li.current-menu-item > a:active\
{\
	 background-color:#.'+ligthest_brigths(to,15)+' !important;\
}\
.top-nav-list.phone li ul  li.current-menu-parent > a, .top-nav-list.phone  li ul  li.current-menu-parent > a:link, .top-nav-list.phone  li ul  li.current-menu-parent > a:visited,.top-nav-list.phone li ul li.current-menu-parent  > a:hover, .top-nav-list.phone  li ul  li.current-menu-parent > a:focus, .top-nav-list.phone  li ul  li.current-menu-parent > a:active,.top-nav-list.phone  li ul  li.has-sub.current-menu-item > a, .top-nav-list.phone  li ul  li.has-sub.current-menu-item > a:link, .top-nav-list.phone  li ul  li.has-sub.current-menu-item > a:visited,.top-nav-list.phone  li ul  li.has-sub.current-menu-ancestor > a:hover, .top-nav-list.phone  li ul  li.has-sub.current-menu-item > a:focus, .top-nav-list.phone  li ul  li.has-sub.current-menu-item > a:active,.top-nav-list.phone li ul  li.current-menu-ancestor > a, .top-nav-list.phone  li ul  li.current-menu-ancestor > a:link, .top-nav-list.phone  li ul  li.current-menu-ancestor > a:visited,.top-nav-list.phone li ul li.current-menu-ancestor  > a:hover, .top-nav-list.phone  li ul  li.current-menu-ancestor > a:focus, .top-nav-list.phone  li ul  li.current-menu-ancestor > a:active \
{\
	 background:#.'+ligthest_brigths(to,15)+' url('+curent_template_url+'/images/arrow.menu.png) right -158px no-repeat !important;\
}\
</style>').appendTo( 'head' );
     	} );
        if(!(jQuery('#custom-menu_elem_back_color-css').length > 0)){
         jQuery('\
			<style type="text/css" id="custom-menu_elem_back_color-css">	\
#back h3 a\
{\
	 color:#'+negativeColor(ligthest_brigths(_wpCustomizeSettings.values['theme_mods_best-magazine[cc_menu_elem_back_color]'],10))+' !important;\
}\
.read_more, #commentform #submit,.reply  ,#menu-button-block ,.top-nav-list.phone   li ul li:hover  > a,.top-nav-list.phone   li ul li  > a:hover, .top-nav-list.phone   li ul li  > a:focus, .top-nav-list.phone   li ul li  > a:active ,.top-nav-list.phone  li.current-menu-ancestor > a:hover, .top-nav-list.phone  li.current-menu-item > a:focus, .top-nav-list.phone  li.current-menu-item > a:active\
{\
	 background-color:#'+_wpCustomizeSettings.values['theme_mods_best-magazine[cc_menu_elem_back_color]']+';\
}\
.read_more:hover,#commentform #submit:hover, .reply:hover \
{\
	 background-color:#'+ligthest_brigths(_wpCustomizeSettings.values['theme_mods_best-magazine[cc_menu_elem_back_color]'],15)+';\
}\
#back \
{\
	 background-color:#'+ligthest_brigths(_wpCustomizeSettings.values['theme_mods_best-magazine[cc_menu_elem_back_color]'],10)+';\
}\
.blog.bage-news .news-post\
{\
	 border-bottom:1px solid '+_wpCustomizeSettings.values['theme_mods_best-magazine[cc_menu_elem_back_color]']+';\
}\
#sidebar-footer .widget-container ul li:before, aside .sidebar-container ul li:before, .most_categories ul li:before \
{\
	 border-left:solid '+_wpCustomizeSettings.values['theme_mods_best-magazine[cc_menu_elem_back_color]']+';\
}\
#top-nav,.phone #top-nav ul,#reply-title small\
{\
	 background:'+_wpCustomizeSettings.values['theme_mods_best-magazine[cc_menu_elem_back_color]']+';\
}\
.top-nav-list.phone  li.has-sub >  a, .top-nav-list.phone  li.has-sub > a:link, .top-nav-list.phone  li.has-sub >  a:visited ,.top-nav-list.phone  li.has-sub:hover > a,.top-nav-list.phone  li.has-sub > a:hover, .top-nav-list.phone  li.has-sub > a:focus, .top-nav-list.phone  li.has-sub >  a:active \
{\
	 background:'+_wpCustomizeSettings.values['theme_mods_best-magazine[cc_menu_elem_back_color]']+' url('+curent_template_url+'/images/arrow.menu.png) right top no-repeat !important;\
}\
.top-nav-list.phone  li ul li.has-sub > a, .top-nav-list.phone  li ul li.has-sub > a:link, .top-nav-list.phone  li ul li.has-sub > a:visited\
{\
	 background:'+_wpCustomizeSettings.values['theme_mods_best-magazine[cc_menu_elem_back_color]']+' url('+curent_template_url+'/images/arrow.menu.png) right -18px no-repeat !important;\
}\
.top-nav-list.phone  li ul li.has-sub:hover > a,.top-nav-list.phone  li ul li.has-sub > a:hover, .top-nav-list.phone  li ul li.has-sub > a:focus, .top-nav-list.phone  li ul li.has-sub > a:active \
{\
	 background:#'+ligthest_brigths(_wpCustomizeSettings.values['theme_mods_best-magazine[cc_menu_elem_back_color]'],15)+' url('+curent_template_url+'/images/arrow.menu.png) right -18px no-repeat !important;\
}\
.top-nav-list.phone  li.current-menu-parent > a, .top-nav-list.phone  li.current-menu-parent > a:link, .top-nav-list.phone  li.current-menu-parent > a:visited,.top-nav-list.phone  li.current-menu-parent > a:hover, .top-nav-list.phone  li.current-menu-parent > a:focus, .top-nav-list.phone  li.current-menu-parent > a:active,.top-nav-list.phone  li.has-sub.current-menu-item  > a, .top-nav-list.phone  li.has-sub.current-menu-item > a:link, .top-nav-list.phone  li.has-sub.current-menu-item > a:visited,.top-nav-list.phone  li.has-sub.current-menu-ancestor > a:hover, .top-nav-list.phone  li.has-sub.current-menu-item > a:focus, .top-nav-list.phone  li.has-sub.current-menu-item > a:active,.top-nav-list.phone  li.current-menu-ancestor > a, .top-nav-list.phone  li.current-menu-ancestor > a:link, .top-nav-list.phone  li.current-menu-ancestor > a:visited,.top-nav-list.phone  li.current-menu-ancestor > a:hover, .top-nav-list.phone  li.current-menu-ancestor > a:focus, .top-nav-list.phone  li.current-menu-ancestor > a:active \
{\
	 background:'+_wpCustomizeSettings.values['theme_mods_best-magazine[cc_menu_elem_back_color]']+' url('+curent_template_url+'/images/arrow.menu.png) right bottom no-repeat !important;\
}\
.top-nav-list.phone  li ul  li.current-menu-item > a, .top-nav-list.phone  li ul  li.current-menu-item > a:link, .top-nav-list.phone  li ul  li.current-menu-item > a:visited,.top-nav-list.phone  li ul  li.current-menu-ancestor > a:hover, .top-nav-list.phone  li ul  li.current-menu-item > a:focus, .top-nav-list.phone  li ul  li.current-menu-item > a:active\
{\
	 background-color:#'+ligthest_brigths(_wpCustomizeSettings.values['theme_mods_best-magazine[cc_menu_elem_back_color]'],15)+' !important;\
}\
.top-nav-list.phone li ul  li.current-menu-parent > a, .top-nav-list.phone  li ul  li.current-menu-parent > a:link, .top-nav-list.phone  li ul  li.current-menu-parent > a:visited,.top-nav-list.phone li ul li.current-menu-parent  > a:hover, .top-nav-list.phone  li ul  li.current-menu-parent > a:focus, .top-nav-list.phone  li ul  li.current-menu-parent > a:active,.top-nav-list.phone  li ul  li.has-sub.current-menu-item > a, .top-nav-list.phone  li ul  li.has-sub.current-menu-item > a:link, .top-nav-list.phone  li ul  li.has-sub.current-menu-item > a:visited,.top-nav-list.phone  li ul  li.has-sub.current-menu-ancestor > a:hover, .top-nav-list.phone  li ul  li.has-sub.current-menu-item > a:focus, .top-nav-list.phone  li ul  li.has-sub.current-menu-item > a:active,.top-nav-list.phone li ul  li.current-menu-ancestor > a, .top-nav-list.phone  li ul  li.current-menu-ancestor > a:link, .top-nav-list.phone  li ul  li.current-menu-ancestor > a:visited,.top-nav-list.phone li ul li.current-menu-ancestor  > a:hover, .top-nav-list.phone  li ul  li.current-menu-ancestor > a:focus, .top-nav-list.phone  li ul  li.current-menu-ancestor > a:active \
{\
	 background:#'+ligthest_brigths(_wpCustomizeSettings.values['theme_mods_best-magazine[cc_menu_elem_back_color]'],15)+' url('+curent_template_url+'/images/arrow.menu.png)right-158pxno-repeat !important;\
}\
\
</style>').appendTo( 'head' );
        
        }
	} 
);
        
wp.customize( 'theme_mods_best-magazine[cc_sideb_background_color]', function( value ) {
    value.bind( function( to ) {
        style = jQuery('#custom-sideb_background_color-css');
        style.remove();
        style = jQuery('\
			<style type="text/css" id="custom-sideb_background_color-css">	\
aside .sidebar-container, .gallery_main_div,.blog.bage-news .news-post ,.commentlist li \
{\
	 background-color:'+to+';\
}\
.children .comment,#respond\
{\
	 background-color:#'+ligthest_brigths(to,37)+';\
}\
</style>').appendTo( 'head' );
     	} );
        if(!(jQuery('#custom-sideb_background_color-css').length > 0)){
         jQuery('\
			<style type="text/css" id="custom-sideb_background_color-css">	\
aside .sidebar-container, .gallery_main_div,.blog.bage-news .news-post ,.commentlist li \
{\
	 background-color:'+_wpCustomizeSettings.values['theme_mods_best-magazine[cc_sideb_background_color]']+';\
}\
.children .comment,#respond\
{\
	 background-color:#'+ligthest_brigths(_wpCustomizeSettings.values['theme_mods_best-magazine[cc_sideb_background_color]'],37)+';\
}\
\
			</style>').appendTo( 'head' );
        
        }
	} 
);
        
wp.customize( 'theme_mods_best-magazine[cc_footer_sideb_background_color]', function( value ) {
    value.bind( function( to ) {
        style = jQuery('#custom-footer_sideb_background_color-css');
        style.remove();
        style = jQuery('\
			<style type="text/css" id="custom-footer_sideb_background_color-css">	\
#footer\
{\
	 border-top-color:#'+ligthest_brigths(to,10)+' !important;\
}\
.footer-sidbar\
{\
	 background-color:'+to+' !important;\
}\
</style>').appendTo( 'head' );
     	} );
        if(!(jQuery('#custom-footer_sideb_background_color-css').length > 0)){
         jQuery('\
			<style type="text/css" id="custom-footer_sideb_background_color-css">	\
#footer\
{\
	 border-top-color:#'+ligthest_brigths(_wpCustomizeSettings.values['theme_mods_best-magazine[cc_footer_sideb_background_color]'],10)+' !important;\
}\
.footer-sidbar\
{\
	 background-color:'+_wpCustomizeSettings.values['theme_mods_best-magazine[cc_footer_sideb_background_color]']+' !important;\
}\
\
			</style>').appendTo( 'head' );
        
        }
	} 
);
        
wp.customize( 'theme_mods_best-magazine[cc_footer_back_color]', function( value ) {
    value.bind( function( to ) {
        style = jQuery('#custom-footer_back_color-css');
        style.remove();
        style = jQuery('\
			<style type="text/css" id="custom-footer_back_color-css">	\
#footer-bottom ,#footer\
{\
	 background-color:'+to+' !important;\
}\
</style>').appendTo( 'head' );
     	} );
        if(!(jQuery('#custom-footer_back_color-css').length > 0)){
         jQuery('\
			<style type="text/css" id="custom-footer_back_color-css">	\
#footer-bottom ,#footer\
{\
	 background-color:'+_wpCustomizeSettings.values['theme_mods_best-magazine[cc_footer_back_color]']+' !important;\
}\
\
			</style>').appendTo( 'head' );
        
        }
	} 
);
        
wp.customize( 'theme_mods_best-magazine[cc_home_top_posts_color]', function( value ) {
    value.bind( function( to ) {
        style = jQuery('#custom-home_top_posts_color-css');
        style.remove();
        style = jQuery('\
			<style type="text/css" id="custom-home_top_posts_color-css">	\
#wd-categories-tabs ul.content, #wd-categories-tabs  ul.tabs li a, #wd-categories-tabs  ul.tabs li a:link, #videos-block ,#wd-categories-tabs  ul.tabs li a \
{\
	 background:'+to+' !important;\
}\
#wd-categories-tabs .content\
{\
	 background-color:'+to+' !important;\
}\
</style>').appendTo( 'head' );
     	} );
        if(!(jQuery('#custom-home_top_posts_color-css').length > 0)){
         jQuery('\
			<style type="text/css" id="custom-home_top_posts_color-css">	\
#wd-categories-tabs ul.content, #wd-categories-tabs  ul.tabs li a, #wd-categories-tabs  ul.tabs li a:link,  #videos-block ,#wd-categories-tabs  ul.tabs li a \
{\
	 background:'+_wpCustomizeSettings.values['theme_mods_best-magazine[cc_home_top_posts_color]']+' !important;\
}\
#wd-categories-tabs .content\
{\
	 background-color:'+_wpCustomizeSettings.values['theme_mods_best-magazine[cc_home_top_posts_color]']+' !important;\
}\
\
			</style>').appendTo( 'head' );
        
        }
	} 
);
        
wp.customize( 'theme_mods_best-magazine[cc_cat_tab_backgr_color]', function( value ) {
    value.bind( function( to ) {
        style = jQuery('#custom-cat_tab_backgr_color-css');
        style.remove();
        style = jQuery('\
			<style type="text/css" id="custom-cat_tab_backgr_color-css">	\
#wd-categories-tabs  ul.tabs li a:hover, #wd-categories-tabs  ul.tabs li a:focus, #wd-categories-tabs  ul.tabs li a:active,#wd-categories-tabs  ul.tabs li.active a, #wd-categories-tabs  ul.tabs li.active a:link, #wd-categories-tabs  ul.tabs li.active a:visited,#wd-categories-tabs  ul.tabs li.active a:hover, #wd-categories-tabs  ul.tabs li.active a:focus, #wd-categories-tabs  ul.tabs li.active a:active\
{\
	 background:'+to+' !important;\
}\
#wd-categories-tabs ul.tabs\
{\
	 border-bottom:1px solid '+to+' !important;\
}\
</style>').appendTo( 'head' );
     	} );
        if(!(jQuery('#custom-cat_tab_backgr_color-css').length > 0)){
         jQuery('\
			<style type="text/css" id="custom-cat_tab_backgr_color-css">	\
#wd-categories-tabs  ul.tabs li a:hover, #wd-categories-tabs  ul.tabs li a:focus, #wd-categories-tabs  ul.tabs li a:active,#wd-categories-tabs  ul.tabs li.active a, #wd-categories-tabs  ul.tabs li.active a:link, #wd-categories-tabs  ul.tabs li.active a:visited,#wd-categories-tabs  ul.tabs li.active a:hover, #wd-categories-tabs  ul.tabs li.active a:focus, #wd-categories-tabs  ul.tabs li.active a:active\
{\
	 background:'+_wpCustomizeSettings.values['theme_mods_best-magazine[cc_cat_tab_backgr_color]']+'  !important;\
}\
#wd-categories-tabs ul.tabs\
{\
	 border-bottom:1px solid '+_wpCustomizeSettings.values['theme_mods_best-magazine[cc_cat_tab_backgr_color]']+' !important;\
}\
\
			</style>').appendTo( 'head' );
        
        }
	} 
);
        
wp.customize( 'theme_mods_best-magazine[cc_top_posts_color]', function( value ) {
    value.bind( function( to ) {
        style = jQuery('#custom-top_posts_color-css');
        style.remove();
        style = jQuery('\
			<style type="text/css" id="custom-top_posts_color-css">	\
#top-posts \
{\
	 background-color:'+to+';\
}\
</style>').appendTo( 'head' );
     	} );
        if(!(jQuery('#custom-top_posts_color-css').length > 0)){
         jQuery('\
			<style type="text/css" id="custom-top_posts_color-css">	\
#top-posts \
{\
	 background-color:'+_wpCustomizeSettings.values['theme_mods_best-magazine[cc_top_posts_color]']+';\
}\
\
			</style>').appendTo( 'head' );
        
        }
	} 
);
        
wp.customize( 'theme_mods_best-magazine[cc_text_headers_color]', function( value ) {
    value.bind( function( to ) {
        style = jQuery('#custom-text_headers_color-css');
        style.remove();
        style = jQuery('\
			<style type="text/css" id="custom-text_headers_color-css">	\
h1, h3, h4, h5, h6, h1>a, h3>a, h4>a, h5>a, h6>a,h1 > a:link, h3 > a:link, h4 > a:link, h5 > a:link, h6 > a:link,h1 > a:hover,h3 > a:hover,h4 > a:hover,h5 > a:hover,h6 > a:hover,h61> a:visited,h3 > a:visited,h4 > a:visited,h5 > a:visited,h6 > a:visited ,#header \
{\
	 color:'+to+';\
}\
</style>').appendTo( 'head' );
     	} );
        if(!(jQuery('#custom-text_headers_color-css').length > 0)){
         jQuery('\
			<style type="text/css" id="custom-text_headers_color-css">	\
h1, h3, h4, h5, h6, h1>a, h3>a, h4>a, h5>a, h6>a,h1 > a:link, h3 > a:link, h4 > a:link, h5 > a:link, h6 > a:link,h1 > a:hover,h3 > a:hover,h4 > a:hover,h5 > a:hover,h6 > a:hover,h61> a:visited,h3 > a:visited,h4 > a:visited,h5 > a:visited,h6 > a:visited ,#header \
{\
	 color:'+_wpCustomizeSettings.values['theme_mods_best-magazine[cc_text_headers_color]']+';\
}\
\
			</style>').appendTo( 'head' );
        
        }
	} 
);

wp.customize( 'theme_mods_best-magazine[cc_primary_text_headers_color]', function( value ) {
    value.bind( function( to ) {
        style = jQuery('#custom-primary_text_headers_color-css');
        style.remove();
        style = jQuery('\
			<style type="text/css" id="custom-primary_text_headers_color-css">	\
h2, h2>a, h2 > a:link, h2 > a:hover,h2 > a:visited, .widget-container h3, .widget-area h3, .most_categories h3>a \
{\
	 color:'+to+';\
}\
#sidebar-footer .widget-container h3 \
{\
	 border-bottom: 1px solid '+to+';\
}\
</style>').appendTo( 'head' );
     	} );
        if(!(jQuery('#custom-primary_text_headers_color-css').length > 0)){
         jQuery('\
			<style type="text/css" id="custom-primary_text_headers_color-css">	\
h2, h2>a, h2 > a:link, h2 > a:hover,h2 > a:visited, .widget-container h3, .widget-area h3, .most_categories h3>a \
{\
	 color:'+_wpCustomizeSettings.values['theme_mods_best-magazine[cc_primary_text_headers_color]']+';\
}\
#sidebar-footer .widget-container h3 \
{\
	border-bottom: 1px solid '+_wpCustomizeSettings.values['theme_mods_best-magazine[cc_primary_text_headers_color]']+';\
}\
\
			</style>').appendTo( 'head' );
        
        }
	} 
);
        
wp.customize( 'theme_mods_best-magazine[cc_primary_text_color]', function( value ) {
    value.bind( function( to ) {
        style = jQuery('#custom-primary_text_color-css');
        style.remove();
        style = jQuery('\
			<style type="text/css" id="custom-primary_text_color-css">	\
body\
{\
	 color:'+to+';\
}\
</style>').appendTo( 'head' );
     	} );
        if(!(jQuery('#custom-primary_text_color-css').length > 0)){
         jQuery('\
			<style type="text/css" id="custom-primary_text_color-css">	\
body\
{\
	 color:'+_wpCustomizeSettings.values['theme_mods_best-magazine[cc_primary_text_color]']+';\
}\
\
			</style>').appendTo( 'head' );
        
        }
	} 
);
        
wp.customize( 'theme_mods_best-magazine[cc_footer_text_color]', function( value ) {
    value.bind( function( to ) {
        style = jQuery('#custom-footer_text_color-css');
        style.remove();
        style = jQuery('\
			<style type="text/css" id="custom-footer_text_color-css">	\
#footer-bottom \
{\
	 color:'+to+';\
}\
</style>').appendTo( 'head' );
     	} );
        if(!(jQuery('#custom-footer_text_color-css').length > 0)){
         jQuery('\
			<style type="text/css" id="custom-footer_text_color-css">	\
#footer-bottom \
{\
	 color:'+_wpCustomizeSettings.values['theme_mods_best-magazine[cc_footer_text_color]']+';\
}\
\
			</style>').appendTo( 'head' );
        
        }
	} 
);
        
wp.customize( 'theme_mods_best-magazine[cc_primary_links_color]', function( value ) {
    value.bind( function( to ) {
        style = jQuery('#custom-primary_links_color-css');
        style.remove();
        style = jQuery('\
			<style type="text/css" id="custom-primary_links_color-css">	\
a:link, a:visited \
{\
	 color:'+to+';\
}\
</style>').appendTo( 'head' );
     	} );
        if(!(jQuery('#custom-primary_links_color-css').length > 0)){
         jQuery('\
			<style type="text/css" id="custom-primary_links_color-css">	\
a:link, a:visited \
{\
	 color:'+_wpCustomizeSettings.values['theme_mods_best-magazine[cc_primary_links_color]']+';\
}\
\
			</style>').appendTo( 'head' );
        
        }
	} 
);
        
wp.customize( 'theme_mods_best-magazine[cc_primary_links_hover_color]', function( value ) {
    value.bind( function( to ) {
        style = jQuery('#custom-primary_links_hover_color-css');
        style.remove();
        style = jQuery('\
			<style type="text/css" id="custom-primary_links_hover_color-css">	\
a:hover ,.top-nav-list.phone  li.current-menu-item > a,.top-nav-list.phone  li.current-menu-item > a:visited\
{\
	 color:'+to+';\
}\
</style>').appendTo( 'head' );
     	} );
        if(!(jQuery('#custom-primary_links_hover_color-css').length > 0)){
         jQuery('\
			<style type="text/css" id="custom-primary_links_hover_color-css">	\
a:hover ,.top-nav-list.phone  li.current-menu-item > a,.top-nav-list.phone  li.current-menu-item > a:visited\
{\
	 color:'+_wpCustomizeSettings.values['theme_mods_best-magazine[cc_primary_links_hover_color]']+';\
}\
\
			</style>').appendTo( 'head' );
        
        }
	} 
);
        
wp.customize( 'theme_mods_best-magazine[cc_menu_links_color]', function( value ) {
    value.bind( function( to ) {
        style = jQuery('#custom-menu_links_color-css');
        style.remove();
        style = jQuery('\
			<style type="text/css" id="custom-menu_links_color-css">	\
.read_more, #commentform #submit,.reply  ,.reply a,#reply-title small a:link,#top-nav.phone  > li  > a, #top-nav.phone  > li  > a:link, #top-nav.phone  > li  > a:visited ,.top-nav-list.phone   li ul li  > a, .top-nav-list.phone   li ul li  > a:link, .top-nav-list.phone   li  ul li > a:visited ,.top-nav-list >ul > li > a, .top-nav-list> ul > li ul > li > a,#top-nav  div  ul  li  a, #top-nav > div > ul > li > a:link, #top-nav > div > div > ul > li > a,.top-nav-list.phone  li.current-menu-ancestor > a:hover, .top-nav-list.phone  li.current-menu-item > a:focus, .top-nav-list.phone  li.current-menu-item > a:active,.top-nav-list.phone  li.current-menu-parent > a, .top-nav-list.phone  li.current-menu-parent > a:link, .top-nav-list.phone  li.current-menu-parent > a:visited,.top-nav-list.phone  li.current-menu-parent > a:hover, .top-nav-list.phone  li.current-menu-parent > a:focus, .top-nav-list.phone  li.current-menu-parent > a:active,.top-nav-list.phone  li.has-sub.current-menu-item  > a, .top-nav-list.phone  li.has-sub.current-menu-item > a:link, .top-nav-list.phone  li.has-sub.current-menu-item > a:visited,.top-nav-list.phone  li.has-sub.current-menu-ancestor > a:hover, .top-nav-list.phone  li.has-sub.current-menu-item > a:focus, .top-nav-list.phone  li.has-sub.current-menu-item > a:active,.top-nav-list.phone  li.current-menu-ancestor > a, .top-nav-list.phone  li.current-menu-ancestor > a:link, .top-nav-list.phone  li.current-menu-ancestor > a:visited, .top-nav-list.phone  li.current-menu-ancestor > a:focus, .top-nav-list.phone  li.current-menu-ancestor > a:active ,.top-nav-list.phone  li ul  li.current-menu-item > a, .top-nav-list.phone  li ul  li.current-menu-item > a:link, .top-nav-list.phone  li ul  li.current-menu-item > a:visited,.top-nav-list.phone  li ul  li.current-menu-ancestor > a:hover, .top-nav-list.phone  li ul  li.current-menu-item > a:focus, .top-nav-list.phone  li ul  li.current-menu-item > a:active,.top-nav-list.phone li ul  li.current-menu-parent > a, .top-nav-list.phone  li ul  li.current-menu-parent > a:link, .top-nav-list.phone  li ul  li.current-menu-parent > a:visited,.top-nav-list.phone li ul li.current-menu-parent  > a:hover, .top-nav-list.phone  li ul  li.current-menu-parent > a:focus, .top-nav-list.phone  li ul  li.current-menu-parent > a:active,.top-nav-list.phone  li ul  li.has-sub.current-menu-item > a, .top-nav-list.phone  li ul  li.has-sub.current-menu-item > a:link, .top-nav-list.phone  li ul  li.has-sub.current-menu-item > a:visited,.top-nav-list.phone  li ul  li.has-sub.current-menu-ancestor > a:hover, .top-nav-list.phone  li ul  li.has-sub.current-menu-item > a:focus, .top-nav-list.phone  li ul  li.has-sub.current-menu-item > a:active,.top-nav-list.phone li ul  li.current-menu-ancestor > a, .top-nav-list.phone  li ul  li.current-menu-ancestor > a:link, .top-nav-list.phone  li ul  li.current-menu-ancestor > a:visited,.top-nav-list.phone li ul li.current-menu-ancestor  > a:hover, .top-nav-list.phone  li ul  li.current-menu-ancestor > a:focus, .top-nav-list.phone  li ul  li.current-menu-ancestor > a:active \
{\
	 color:'+to+';\
}\
.read_more:hover,#commentform #submit:hover, .reply:hover \
{\
	 color:#'+ligthest_brigths(to,50)+' !important;\
}\
</style>').appendTo( 'head' );
     	} );
        if(!(jQuery('#custom-menu_links_color-css').length > 0)){
         jQuery('\
			<style type="text/css" id="custom-menu_links_color-css">	\
.read_more, #commentform #submit,.reply  ,.reply a,#reply-title small a:link,#top-nav.phone  > li  > a, #top-nav.phone  > li  > a:link, #top-nav.phone  > li  > a:visited ,.top-nav-list.phone   li ul li  > a, .top-nav-list.phone   li ul li  > a:link, .top-nav-list.phone   li  ul li > a:visited ,.top-nav-list >ul > li > a, .top-nav-list> ul > li ul > li > a,#top-nav  div  ul  li  a, #top-nav > div > ul > li > a:link, #top-nav > div > div > ul > li > a,.top-nav-list.phone  li.current-menu-ancestor > a:hover, .top-nav-list.phone  li.current-menu-item > a:focus, .top-nav-list.phone  li.current-menu-item > a:active,.top-nav-list.phone  li.current-menu-parent > a, .top-nav-list.phone  li.current-menu-parent > a:link, .top-nav-list.phone  li.current-menu-parent > a:visited,.top-nav-list.phone  li.current-menu-parent > a:hover, .top-nav-list.phone  li.current-menu-parent > a:focus, .top-nav-list.phone  li.current-menu-parent > a:active,.top-nav-list.phone  li.has-sub.current-menu-item  > a, .top-nav-list.phone  li.has-sub.current-menu-item > a:link, .top-nav-list.phone  li.has-sub.current-menu-item > a:visited,.top-nav-list.phone  li.has-sub.current-menu-ancestor > a:hover, .top-nav-list.phone  li.has-sub.current-menu-item > a:focus, .top-nav-list.phone  li.has-sub.current-menu-item > a:active,.top-nav-list.phone  li.current-menu-ancestor > a, .top-nav-list.phone  li.current-menu-ancestor > a:link, .top-nav-list.phone  li.current-menu-ancestor > a:visited, .top-nav-list.phone  li.current-menu-ancestor > a:focus, .top-nav-list.phone  li.current-menu-ancestor > a:active ,.top-nav-list.phone  li ul  li.current-menu-item > a, .top-nav-list.phone  li ul  li.current-menu-item > a:link, .top-nav-list.phone  li ul  li.current-menu-item > a:visited,.top-nav-list.phone  li ul  li.current-menu-ancestor > a:hover, .top-nav-list.phone  li ul  li.current-menu-item > a:focus, .top-nav-list.phone  li ul  li.current-menu-item > a:active,.top-nav-list.phone li ul  li.current-menu-parent > a, .top-nav-list.phone  li ul  li.current-menu-parent > a:link, .top-nav-list.phone  li ul  li.current-menu-parent > a:visited,.top-nav-list.phone li ul li.current-menu-parent  > a:hover, .top-nav-list.phone  li ul  li.current-menu-parent > a:focus, .top-nav-list.phone  li ul  li.current-menu-parent > a:active,.top-nav-list.phone  li ul  li.has-sub.current-menu-item > a, .top-nav-list.phone  li ul  li.has-sub.current-menu-item > a:link, .top-nav-list.phone  li ul  li.has-sub.current-menu-item > a:visited,.top-nav-list.phone  li ul  li.has-sub.current-menu-ancestor > a:hover, .top-nav-list.phone  li ul  li.has-sub.current-menu-item > a:focus, .top-nav-list.phone  li ul  li.has-sub.current-menu-item > a:active,.top-nav-list.phone li ul  li.current-menu-ancestor > a, .top-nav-list.phone  li ul  li.current-menu-ancestor > a:link, .top-nav-list.phone  li ul  li.current-menu-ancestor > a:visited,.top-nav-list.phone li ul li.current-menu-ancestor  > a:hover, .top-nav-list.phone  li ul  li.current-menu-ancestor > a:focus, .top-nav-list.phone  li ul  li.current-menu-ancestor > a:active \
{\
	 color:'+_wpCustomizeSettings.values['theme_mods_best-magazine[cc_menu_links_color]']+';\
}\
.read_more:hover,#commentform #submit:hover, .reply:hover \
{\
	 color:#'+ligthest_brigths(_wpCustomizeSettings.values['theme_mods_best-magazine[cc_menu_links_color]'],50)+' !important;\
}\
	</style>').appendTo( 'head' );
        
        }
	} 
);
        
wp.customize( 'theme_mods_best-magazine[cc_menu_links_hover_color]', function( value ) {
    value.bind( function( to ) {
        style = jQuery('#custom-menu_links_hover_color-css');
        style.remove();
        style = jQuery('\
			<style type="text/css" id="custom-menu_links_hover_color-css">	\
.top-nav-list .current-menu-item,.top-nav-list li li:hover .top-nav-list a:hover, .top-nav-list .current-menu-item a:hover,.top-nav-list li:hover,.top-nav-list li a:hover,.top-nav-list li.current-menu-item, .top-nav-list li.current_page_item,.top-nav-list li.current-menu-item a, .top-nav-list li.current_page_item a,.top-nav-list.phone  > li:hover > a ,.top-nav-list.phone  > li  > a:hover, .top-nav-list.phone  > li  > a:focus, .top-nav-list.phone  > li  > a:active ,#wd-categories-tabs  ul.tabs li a:hover, #wd-categories-tabs  ul.tabs li a:focus, #wd-categories-tabs  ul.tabs li a:active,#wd-categories-tabs  ul.tabs li.active a, #wd-categories-tabs  ul.tabs li.active a:link, #wd-categories-tabs  ul.tabs li.active a:visited,#wd-categories-tabs  ul.tabs li.active a:hover, #wd-categories-tabs  ul.tabs li.active a:focus, #wd-categories-tabs  ul.tabs li.active a:active,.top-nav-list > li:hover > a, .top-nav-list > li ul > li > a:hover,.top-nav-list.phone   li ul li:hover  > a,.top-nav-list.phone   li ul li  > a:hover, .top-nav-list.phone   li ul li  > a:focus, .top-nav-list.phone   li ul li  > a:active \
{\
	 color:'+to+' !important;\
}\
</style>').appendTo( 'head' );
     	} );
        if(!(jQuery('#custom-menu_links_hover_color-css').length > 0)){
         jQuery('\
			<style type="text/css" id="custom-menu_links_hover_color-css">	\
.top-nav-list .current-menu-item,.top-nav-list li li:hover .top-nav-list a:hover, .top-nav-list .current-menu-item a:hover,.top-nav-list li:hover,.top-nav-list li a:hover,.top-nav-list li.current-menu-item, .top-nav-list li.current_page_item,.top-nav-list li.current-menu-item a, .top-nav-list li.current_page_item a,.top-nav-list.phone  > li:hover > a ,.top-nav-list.phone  > li  > a:hover, .top-nav-list.phone  > li  > a:focus, .top-nav-list.phone  > li  > a:active ,#wd-categories-tabs  ul.tabs li a:hover, #wd-categories-tabs  ul.tabs li a:focus, #wd-categories-tabs  ul.tabs li a:active,#wd-categories-tabs  ul.tabs li.active a, #wd-categories-tabs  ul.tabs li.active a:link, #wd-categories-tabs  ul.tabs li.active a:visited,#wd-categories-tabs  ul.tabs li.active a:hover, #wd-categories-tabs  ul.tabs li.active a:focus, #wd-categories-tabs  ul.tabs li.active a:active,.top-nav-list > li:hover > a, .top-nav-list > li ul > li > a:hover,.top-nav-list.phone   li ul li:hover  > a,.top-nav-list.phone   li ul li  > a:hover, .top-nav-list.phone   li ul li  > a:focus, .top-nav-list.phone   li ul li  > a:active \
{\
	 color:'+_wpCustomizeSettings.values['theme_mods_best-magazine[cc_menu_links_hover_color]']+' !important;\
}\
	</style>').appendTo( 'head' );
        
        }
	} 
);
        
wp.customize( 'theme_mods_best-magazine[cc_menu_color]', function( value ) {
    value.bind( function( to ) {
        style = jQuery('#custom-menu_color-css');
        style.remove();
        style = jQuery('\
			<style type="text/css" id="custom-menu_color-css">	\
#header-block,.top-nav-list li li:hover .top-nav-list a:hover, .top-nav-list .current-menu-item a:hover,.top-nav-list li:hover,.top-nav-list li a:hover\
{\
	 background-color:'+to+';\
}\
.top-nav-list.phone  > li:hover > a ,.top-nav-list.phone  > li  > a:hover, .top-nav-list.phone  > li  > a:focus, .top-nav-list.phone  > li  > a:active \
{\
	 background:'+to+';\
}\
</style>').appendTo( 'head' );
     	} );
        if(!(jQuery('#custom-menu_color-css').length > 0)){
         jQuery('\
			<style type="text/css" id="custom-menu_color-css">	\
#header-block,.top-nav-list li li:hover .top-nav-list a:hover, .top-nav-list .current-menu-item a:hover,.top-nav-list li:hover,.top-nav-list li a:hover\
{\
	 background-color:'+_wpCustomizeSettings.values['theme_mods_best-magazine[cc_menu_color]']+';\
}\
.top-nav-list.phone  > li:hover > a ,.top-nav-list.phone  > li  > a:hover, .top-nav-list.phone  > li  > a:focus, .top-nav-list.phone  > li  > a:active \
{\
	 background:'+_wpCustomizeSettings.values['theme_mods_best-magazine[cc_menu_color]']+';\
}\
</style>').appendTo( 'head' );
        
        }
	} 
);
        
wp.customize( 'theme_mods_best-magazine[cc_selected_menu_color]', function( value ) {
    value.bind( function( to ) {
        style = jQuery('#custom-selected_menu_color-css');
        style.remove();
        style = jQuery('\
			<style type="text/css" id="custom-selected_menu_color-css">	\
.top-nav-list .current-menu-item,.top-nav-list li.current-menu-item, .top-nav-list li.current_page_item,.top-nav-list.phone  li.current-menu-item > a,.top-nav-list.phone  li.current-menu-item > a:visited\
{\
	 background-color:'+to+';\
}\
.top-nav-list> ul > li ul,.top-nav-list > li ul \
{\
	 background:'+hex_to_rgba(to,0.8)+';\
}\
#top-nav.phone  > li  > a, #top-nav.phone  > li  > a:link, #top-nav.phone  > li  > a:visited \
{\
	 background:'+to+';\
}\
</style>').appendTo( 'head' );
     	} );
        if(!(jQuery('#custom-selected_menu_color-css').length > 0)){
         jQuery('\
			<style type="text/css" id="custom-selected_menu_color-css">	\
.top-nav-list .current-menu-item,.top-nav-list li.current-menu-item, .top-nav-list li.current_page_item,.top-nav-list.phone  li.current-menu-item > a,.top-nav-list.phone  li.current-menu-item > a:visited\
{\
	 background-color:'+_wpCustomizeSettings.values['theme_mods_best-magazine[cc_selected_menu_color]']+';\
}\
.top-nav-list> ul > li ul,.top-nav-list > li ul \
{\
	 background:'+hex_to_rgba(_wpCustomizeSettings.values['theme_mods_best-magazine[cc_selected_menu_color]'],0.8)+';\
}\
#top-nav.phone  > li  > a, #top-nav.phone  > li  > a:link, #top-nav.phone  > li  > a:visited \
{\
	 background:'+_wpCustomizeSettings.values['theme_mods_best-magazine[cc_selected_menu_color]']+';\
}\
			</style>').appendTo( 'head' );
        
        }
	} 
);
        
wp.customize( 'theme_mods_best-magazine[cc_logo_text_color]', function( value ) {
    value.bind( function( to ) {
        style = jQuery('#custom-logo_text_color-css');
        style.remove();
        style = jQuery('\
			<style type="text/css" id="custom-logo_text_color-css">	\
a:link.site-title-a,a:hover.site-title-a,a:visited.site-title-a,a.site-title-a,#logo h1\
{\
	 color:'+to+';\
}\
</style>').appendTo( 'head' );
     	} );
        if(!(jQuery('#custom-logo_text_color-css').length > 0)){
         jQuery('\
			<style type="text/css" id="custom-logo_text_color-css">	\
a:link.site-title-a,a:hover.site-title-a,a:visited.site-title-a,a.site-title-a,#logo h1\
{\
	 color:'+_wpCustomizeSettings.values['theme_mods_best-magazine[cc_logo_text_color]']+';\
}\
			</style>').appendTo( 'head' );
        
        }
	} 
);
} )( jQuery );