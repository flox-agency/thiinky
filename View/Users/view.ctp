<div class="module profile-card component profile-header">
	<div class="profile-header-inner flex-module clearfix">
		<a href="/thiinky/img/res/11-17-2011_1-56-53_PM.png" class="profile-picture media-thumbnail">
			<img src="/thiinky/img/res/11-17-2011_1-56-53_PM_bigger.png" alt="Think Cloud" class="avatar size73">
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
				<a  href="">
					<strong><?php echo $nbReceived ?></strong> Recus
				</a>
			</li>
			<li>
				<a  href="">
					<strong><?php echo $nbSent ?></strong> Envoyés
				</a>
			</li>
			<li>
				<a class="" href="">
					<strong>286</strong> Amis
				</a>
			</li>
		</ul>
	</div>
</div>
<div class="module component composer">
	<div class="composer-inner">
		<div class="ui-widget">
		  <input id="tags" placeholder="Exprimez-vous..."/>
		</div>
	</div>
</div>
<div class="content-main" id="timeline">
	<div class="content-header">
		<div class="header-inner">
			<h2>
				Thiinkies
			</h2>
		</div>
	</div>
	<div class="stream-container" data-since-id="<?php echo (!empty($thiinkies)) ? $thiinkies[0]['Thiinky']['id'] : '' ?>">
		<div class="stream profile-stream">
			<ol class="stream-items">
				<?php $this->log($thiinkies,'debug'); ?>
				<?php foreach ($thiinkies as $thiinky) : ?>
				<li class="stream-item expanding-stream-item">
					<div class="tweet original-tweet">
						<div class="content">
							<div class="stream-item-header">
								<small class="time">
									<a class="tweet-timestamp" href="">
										<span class="_timestamp js-short-timestamp " data-time="1356008767" data-long-form="true"><?php echo $thiinky['Thiinky']['created'] ?></span>
									</a>
								</small>
								<a class="account-group" href="<?php echo $this->Html->url(array($thiinky['Sender']['username'])) ?>">
									<img class="avatar " src="/thiinky/img/res/11-17-2011_1-56-53_PM_normal.png" alt="Think Cloud">
									<strong class="fullname"><?php echo $thiinky['Sender']['name']; ?></strong>
									<span>‏</span>
									<span class="username"><s>@</s><b><?php echo $thiinky['Sender']['username']; ?></b></span>
								</a>
							</div>
							<p>
								<?php echo $thiinky['ThiinkyType']['text'] ;?> <?php echo $this->Html->link('@'.$thiinky['Recipient']['username'],array('action'=>'view',$thiinky['Recipient']['username']))?>
							</p>
						</div>
					</div>
				</li>
				<?php endforeach ; ?>
			</ol>
			<div class="stream-footer">
				<div class="timeline-end">
					<div class="stream-end">
						<div class="stream-end-inner">
							<p>
								<button type="button" class="btn-link back-to-top hidden" style="display: inline-block;">Retour en haut ↑</button>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div style="diplay:none">
	<input id="init-data" type="hidden" value='<?php echo json_encode(array('profile'=>$user['User']['username']))?>'>
</div>