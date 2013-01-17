<?php if (!empty($thiinky)) : ?>
<li class="stream-item expanding-stream-item">
	<div class="tweet original-tweet">
		<div class="content">
			<div class="stream-item-header">
				<small class="time">
					<a class="tweet-timestamp" href="">
						<span class="_timestamp js-short-timestamp " data-time="1356008767" data-long-form="true"><?php echo $thiinky['Thiinky']['created'] ?></span>
					</a>
				</small>
				<a class="account-group" href="/thiinky/users/view/kevin">
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
<?php endif ?>