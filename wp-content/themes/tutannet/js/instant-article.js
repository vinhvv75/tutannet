/*
* Instant Article Script 0.1
*/

jQuery(document).ready(function($){
	var gallery = $('.cd-gallery'),
		foldingPanel = $('.cd-folding-panel'),
		mainContent = $('.cd-main'),
		start, post_id, post_url;	
	/* open folding content */
	gallery.on('click', 'a', function(event){
		console.log('Loading "' + $(this).attr('title') + '"');
		start = new Date().getTime();
		post_id = $(this).attr('rel');
		post_url = $(this).attr('href');
		event.preventDefault();
		openItemInfo(getBaseUrl() + 'ajaxpost/?id=' + $(this).attr('rel'));
	});
	
	var articleList = queryArticles(1,'all');
	$.when(articleList).done(function(){autoSaveArticleList(articleList);});
	/* close folding content */
	foldingPanel.on('click', '.cd-close', function(event){
		event.preventDefault();
		toggleContent('', false);
	});
	gallery.on('click', function(event){
		/* detect click on .cd-gallery::before when the .cd-folding-panel is open */
		if($(event.target).is('.cd-gallery') && $('.fold-is-open').length > 0 ) toggleContent('', false);
	})

	function openItemInfo(url) {
		var mq = viewportSize();
		if( gallery.offset().top > $(window).scrollTop() && mq != 'mobile') {
			/* if content is visible above the .cd-gallery - scroll before opening the folding panel */
			$('body,html').animate({
				'scrollTop': gallery.offset().top
			}, 100, function(){ 
	           	toggleContent(url, true);
	        }); 
	    } else if( gallery.offset().top + gallery.height() < $(window).scrollTop() + $(window).height()  && mq != 'mobile' ) {
			/* if content is visible below the .cd-gallery - scroll before opening the folding panel */
			$('body,html').animate({
				'scrollTop': gallery.offset().top + gallery.height() - $(window).height()
			}, 100, function(){ 
	           	toggleContent(url, true);
	        });
		} else {
			toggleContent(url, true);
		}
	}
	
	function toggleContent(url, bool) {
		if( bool ) {
			/* load and show new content */
			if (isSupportLocalStorage && isArticleSaved(post_id)) {
					retrieveArticle(post_id,function(){actionContent();});
			 } else {
				console.log('Reading for the first time');
				var foldingContent = foldingPanel.find('.cd-fold-content');
				foldingContent.load(url, function(event){
					setTimeout(function(){actionContent()}, 100);
					saveArticle(post_id);
				});
				}
					} else {
			/* close the folding panel */
			var mq = viewportSize();
			foldingPanel.removeClass('is-open');
			mainContent.removeClass('fold-is-open');
			
			(mq == 'mobile' || $('.no-csstransitions').length > 0 ) 
				/* according to the mq, immediately remove the .overflow-hidden or wait for the end of the animation */
				? $('body').removeClass('overflow-hidden')
				
				: mainContent.find('.cd-item').eq(0).one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
					$('body').removeClass('overflow-hidden');
					mainContent.find('.cd-item').eq(0).off('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend');
				});
		}
		
	}
	
	function actionContent() {
			$('body').addClass('overflow-hidden');
			foldingPanel.addClass('is-open');
			mainContent.addClass('fold-is-open');
			var end = new Date().getTime();
			var time = (end - start)/1000;
			console.log('Time article loaded:', time, 'second(s)');
			console.log('----------------------------------------');	
	}

	function viewportSize() {
		/* retrieve the content value of .cd-main::before to check the actua mq */
		return window.getComputedStyle(document.querySelector('.cd-main'), '::before').getPropertyValue('content').replace(/"/g, "").replace(/'/g, "");
	}
	
});

function getBaseUrl() {
    var re = new RegExp(/^.*\//);
    return re.exec(window.location.href);
}

function saveArticle(id) {
	var readPost = $('#post-'+id),
		readContent = readPost.parent(),
		entry = readContent.prop('outerHTML');
	if(typeof entry === 'undefined' || entry === null) {
		console.log('Local Storage Failed!'); 
	}
	else {
		localStorage.setItem('tutannet_post-' + id, entry);
		console.log('Saved data of post id', id);
	}
}

function retrieveArticle(id,complete) {
	console.log('Retrieving data of post id', id);
	var content = localStorage.getItem('tutannet_post-' + id);
	$(content).replaceAll('.instant-article');
	$.when( $(content) ).done(function(){ complete(); });
}

// check if a certain post data is store in Local Storage
function isArticleSaved(id) {
	if (localStorage.getItem('tutannet_post-' + id) == null) { return false;}
	else return true;
}

function autoSaveArticle(id) {
	if (!isArticleSaved(id)) {
		var cd = $('#instant-article-'+id);
			url = getBaseUrl() + '/ajaxpost/?id=' + id;
		cd.load(url,function(){
			saveArticle(id); 
			console.log('Auto saved data of post id', id);
			$.when(saveArticle()).done(function(){
				cd.empty();
			});
		});
		
	} else return false;
}

function autoSaveArticleList(articleList) {
	for (i = 0; i < articleList.length; i++) {
		autoSaveArticle(articleList[i]);
	}
}

// Query articles in a section with id number
function queryArticles(section_id,mode) {
	var articles = $('.instant-articles'+section_id); //.instant-article1, instant-article2, ...
	var articleList = $('div[id^="instant-article-"]');
	var article_idList = [];
	mode = '';
	article_count = 0;
	
	if (mode === 'all') {
		article_count = articleList.length;
		for (i = 0; i < articleList.length; i++) {
			article_idList[i] = $(articleList[i]).attr('rel');
		}
	}
	return article_idList;
}

//check if the browser has Local Storage supported
function isSupportLocalStorage() {
	if (Modernizr.localstorage) return true;
	else return false;
}








 

	
	
	