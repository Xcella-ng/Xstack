@extends('components.layout')
@section('body')
	<div id="error-bag" data-errors='<?= json_encode($error) ?>'></div>
	<nav class="space-items">
		<div class="nav-links">
			<a href="" class="left-menu-toggler active" data-id="#chat-contacts" title="Chats">
				<span>Chats</span>
				<span><i class="far fa-comments"></i></span>
			</a>
			<a href="" class="left-menu-toggler" data-id="#chat-requests" title="Chat Requests">
				<span>Requests</span>
				<span><i class="far fa-comment-dots"></i></span>
			</a>
			<a href="" class="left-menu-toggler" data-id="#chat-archives" title="Archived">
				<span>Archived</span>
				<span><i class="far fa-archive"></i></span>
			</a>
		</div>
		<a href="" class="user-profile-toggler" title="Profile">
			<!-- <img src="assets/img/user-default.png" class="profile-img rounded-circle" alt=""> -->
			<i class="fad fa-3x fa-user-circle"></i>
		</a>
	</nav>
	
	<div class="chat-wrapper">
		<section id="chat-contacts" class="left-menu active">
			<h3 style="padding: .5rem;margin: 0;">Friends</h3>
			@foreach($chat_messages as $chat_message)
				<a href="" class="chat-friend" data-messages='<?php echo json_encode($chat_message); ?>'>
					<div class="chat-friend-img"><i class="fa fa-3x fa-user-circle"></i></div>
					<div class="chat-friend-info">
						<span class="name" title="<?= $chat_message['name']; ?>"><?= $chat_message['name']; ?></span>
						<div>
						<span class="message" title="<?= end($chat_message['messages'][array_key_last($chat_message['messages'])])['message']; ?>">
							<span class="date"><?= array_key_last($chat_message['messages']); ?></span>
							&bull;
							<?= end($chat_message['messages'][array_key_last($chat_message['messages'])])['message']; ?>
						</span>
						</div>
					</div>
				</a>
			@endforeach
		</section>
		
		<section id="chat-requests" class="left-menu">
			<h3 style="padding: .5rem;margin: 0;">Chat Requests</h3>
			@foreach($chat_messages as $chat_message)
				<a href="" class="chat-friend" data-messages='<?php echo json_encode($chat_message); ?>'>
					<div class="chat-friend-img"><i class="fa fa-3x fa-user-circle"></i></div>
					<div class="chat-friend-info">
						<span class="name" title="<?= $chat_message['name']; ?>"><?= $chat_message['name']; ?></span>
						<div>
						<span class="message" title="<?= end($chat_message['messages'][array_key_last($chat_message['messages'])])['message']; ?>">
							<span class="date"><?= array_key_last($chat_message['messages']); ?></span>
							&bull;
							<?= end($chat_message['messages'][array_key_last($chat_message['messages'])])['message']; ?>
						</span>
						</div>
					</div>
				</a>
			@endforeach
		</section>
		<section id="chat-archives" class="left-menu">
			<h3 style="padding: .5rem;margin: 0;">Archived</h3>
			@foreach ($chat_messages as $chat_message)
				<a href="" class="chat-friend" data-messages='<?php echo json_encode($chat_message); ?>'>
					<div class="chat-friend-img"><i class="fa fa-3x fa-user-circle"></i></div>
					<div class="chat-friend-info">
						<span class="name" title="<?= $chat_message['name']; ?>"><?= $chat_message['name']; ?></span>
						<div>
						<span class="message" title="<?= end($chat_message['messages'][array_key_last($chat_message['messages'])])['message']; ?>">
							<span class="date"><?= array_key_last($chat_message['messages']); ?></span>
							&bull;
							<?= end($chat_message['messages'][array_key_last($chat_message['messages'])])['message']; ?>
						</span>
						</div>
					</div>
				</a>
			@endforeach
		</section>
		
		<section id="chat-space">
			<div class="chat-space-body">
				<div class="chats">
					<div class="chat-init" style="margin: auto;">Click on a chat to start.</div>
					<div class="chat-top">
						<div class="bio">
							<!-- <i class="fa fa-4x fa-user-circle"></i>
							<h4>John Doe</h4>
	
							<span>You're friends</span>
							<span>Lives in Abuja</span>
							<span>Studied at UNKNWON</span> -->
							
							<!-- <p><a href="">View profile</a></p> -->
						</div>
					</div>
					<div class="chat-main">
					
					</div>
				</div>
			</div>
			<div class="chat-space-bottom">
				<button type="button" class="fx-btn rounded-circle fx-btn-primary" style="padding: 0;height: 35px;width: 35px;display: flex;">
					<i class="fa fa-paperclip fa-rotate-by" style="--fa-rotate-angle: -40deg;margin: auto;"></i>
				</button>
				<form action="" method="post" id="chat-form">
					<div contenteditable="true" aria-placeholder="Type a message" inputmode="true"></div>
					<!-- <textarea name="" id="" placeholder="Type a message..."></textarea> -->
				</form>
				<button type="submit" form="chat-form" class="fx-btn fx-btn-lg fx-btn-link fx-btn-primary"><i class="fa fa-send"></i></button>
			</div>
		</section>
		<!-- <aside id="contact-info">d</aside> -->
	</div>
@endsection
