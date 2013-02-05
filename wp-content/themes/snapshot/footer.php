<div id="footer">
	<div class="container">
		<ul class="widgets">
			<?php dynamic_sidebar('site-footer') ?>
		</ul>
		<div class="clear"></div>
		
		<div id="footer-copyright">
			<?php if(siteorigin_setting('general_attribution')) : ?>
				<div class="designer">
					<?php printf(__('Theme By <a href="%s">SiteOrigin</a>', 'snapshot'), 'http://siteorigin.com') ?>
				</div>
			<?php endif; ?>
				
			<div class="owner">
				<?php
					print str_replace(
						array('{sitename}', '{year}'),
						array(get_bloginfo('name'), date('Y')),
						siteorigin_setting('general_copyright')
					);
				?>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</div>
<?php wp_footer() ?>
</body>
</html>