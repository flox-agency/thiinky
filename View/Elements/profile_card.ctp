<div class="module profile-card component profile-header">
	<div class="profile-header-inner flex-module clearfix">
		<a href="/thiinky/img/res/11-17-2011_1-56-53_PM.png" class="profile-picture media-thumbnail">
			<img src="<?php echo $user['User']['avatar_big'] ?>" alt="Think Cloud" class="avatar size73">
		</a>
		<div class="profile-card-inner" data-screen-name="Think_Cloud" data-user-id="75941531">
			<h1 class="fullname">
				<?php echo $user['User']['name']; ?>
			</h1>

			<h2 class="username">
				<span class="screen-name"><s>@</s><?php echo $user['User']['username']; ?></span>
			</h2>
			<p class="bio ">Web Design, Brand Design, Web Development, Photography, Video, Print and anything else that is web. It's where we play.</p>
			<p class="location-and-url">
				<span class="location">
					Perth, Australia
				</span>
				<span class="divider">·</span>

				<span class="url">

					<a target="_blank" rel="me nofollow" href="http://www.thinkcloud.com.au">
						http://www.thinkcloud.com.au
					</a>
				</span>
			</p>
		</div>
	</div>
	<div class="flex-module profile-banner-footer clearfix">
		<ul class="stats ">
			<li>
				<a  href="" data-element-term="received_stats">
					<strong><?php echo $nbReceived ?></strong> Recus
				</a>
			</li>
			<li>
				<a  href="" data-element-term="sent_stats">
					<strong><?php echo $nbSent ?></strong> Envoyés
				</a>
			</li>
			<li>
				<a class="" href="" data-element-term="">
					<strong>286</strong> Amis
				</a>
			</li>
		</ul>
	</div>
</div>