<?php echo $this->element('profile_card',array('user'=>$user,'nbSent'=>$nbSent,'nbReceived'=>$nbReceived)); ?>
<div class="module component composer">
	<div class="composer-inner">
		<form id="composerForm" action="/thiinky/thiinkies/create.json" method="Post">
			<div class="ui-widget">
			  <input id="tags" placeholder="A qui pensez-vous?" name="data[tags]"/>
			  <input type="submit">
			</div>
		</form>
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
										<span class="_timestamp js-short-timestamp timeago" data-time="1356008767" data-long-form="true" title="<?php echo $thiinky['Thiinky']['created'] ?>"></span>
									</a>
								</small>
								<a class="account-group tips" href="<?php echo $this->Html->url(array('action'=>'index',$thiinky['Sender']['username'])); ?>" rel="<?php echo $this->Html->url(array('action'=>'popup',$thiinky['Sender']['username'],'ext'=>'json')); ?>">
									<img class="avatar " src="<?php echo $thiinky['Sender']['avatar_normal'] ?>" alt="Think Cloud">
									<a href="<?php echo $this->Html->url(array('action'=>'index',$thiinky['Sender']['username'])) ?>"><strong class="fullname"><?php echo $thiinky['Sender']['name']; ?></strong></a>
									<span>‏</span>
									<span class="username"><s>@</s><b><?php echo $thiinky['Sender']['username']; ?></b></span>
								</a>
							</div>
							<p>
								<?php echo $thiinky['ThiinkyType']['text'] ;?> <?php echo $this->Html->link('@'.$thiinky['Recipient']['username'],array('action'=>'index',$thiinky['Recipient']['username']))?>
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
<div id="box1" style="display: none; border: 1px solid red,min-height:300px">
</div>