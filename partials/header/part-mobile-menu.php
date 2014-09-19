<?php 
/**
 * Div Framework stock responsive mobile menu
 *
 */ ?>

<div id="mobile-menu" class="mobile">
	<div class="inner-mobile-menu wrap">
		<div class="mobile-menu-header">
			<ul class="icons">
				<li id="menu-icon" class="menu-icon"><div></div></li>
				<li class="mobile-logo">
					<a href="<?php bloginfo('url') ?>">
						<div></div>
					</a>
				</li>
				<li class="search-icon"><div></div></li>
			</ul>
		</div>
		<div class="mobile-menu-content">
			<div class="mobile-search-container">
				<div class="mobile-search wrap">
					<form method="get" id="mobile-searchform" action="<?php home_url(); ?>/">
						<div id="mobile-search-submit">
							<input type="submit" id="searchsubmit" value="Search" class="btn" />
						</div>
						<div id="mobile-search-input">
							<input type="text" size="18" value="<?php echo esc_html($s, 1); ?>" name="s" id="s" placeholder="" />
						</div>
					</form>
				</div>
			</div>
			
			<?php df_mobile_nav(); ?>
		</div>
	</div>
</div>