<?php
$chat_messages = (object) [
	[
		'id' => 1,
		'name' => 'john doe',
		'is_friend' => true,
		'location' => 'Abuja',
		'messages' => [
			date('M j, Y') === 'Aug 28, 2024' ? 'Today' : (date_diff(new DateTime('now'), new DateTime('Aug 28, 2024'))->days === 1 ? 'Yesterday' : 'Aug 28, 2024') => [
				[
					'type' => 'from',
					'time' => '10:00am',
					'message' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus autem consequuntur, repellat amet id nemo temporibus dolorem magni. Rerum incidunt maxime aliquam voluptates quod quae amet? Ut ratione soluta cupiditate.'
				],
				[
					'type' => 'from',
					'time' => '10:05am',
					'message' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam, ea praesentium eligendi inventore quos facere ab blanditiis perspiciatis deserunt, aliquid tenetur cum eaque voluptatibus adipisci harum nostrum possimus sunt? Non.'
				],
			],
			date('M j, Y') === 'Aug 31, 2024' ? 'Today' : (date_diff(new DateTime('now'), new DateTime('Aug 31, 2024'))->days === 1 ? 'Yesterday' : 'Aug 31, 2024') => [
				[
					'type' => 'from',
					'time' => '10:00am',
					'message' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus autem consequuntur, repellat amet id nemo temporibus dolorem magni. Rerum incidunt maxime aliquam voluptates quod quae amet? Ut ratione soluta cupiditate.'
				],
				[
					'type' => 'to',
					'time' => '10:05am',
					'message' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam, ea praesentium eligendi inventore quos facere ab blanditiis perspiciatis deserunt, aliquid tenetur cum eaque voluptatibus adipisci harum nostrum possimus sunt? Non.'
				],
			],
			date('M j, Y') === 'Sep 1, 2024' ? 'Today' : (date_diff(new DateTime('now'), new DateTime('Sep 1, 2024'))->days === 1 ? 'Yesterday' : 'Sep 1, 2024') => [
				[
					'type' => 'to',
					'time' => '07:00pm',
					'message' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates blanditiis perspiciatis natus fugit explicabo nihil enim, consequatur dolorem! Nisi pariatur itaque sit perspiciatis laborum sequi a deleniti architecto natus neque.'
				],
				[
					'type' => 'from',
					'time' => '09:12pm',
					'message' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias voluptate reiciendis magnam atque eos ut ipsa odio praesentium? A mollitia, odit autem harum modi culpa est non inventore commodi. Ullam?'
				],
			],
		],
	],
	[
		'id' => 2,
		'name' => 'Lillian doe',
		'is_friend' => true,
		'location' => 'Sokoto',
		'messages' => [
			date('M j, Y') === 'Aug 28, 2024' ? 'Today' : (date_diff(new DateTime('now'), new DateTime('Aug 28, 2024'))->days === 1 ? 'Yesterday' : 'Aug 28, 2024') => [
				[
					'type' => 'from',
					'time' => '06:13am',
					'message' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Totam nisi ut quidem neque eum porro ad praesentium iure provident, optio incidunt voluptate quae a molestiae debitis? Rerum eveniet delectus quibusdam?'
				],
				[
					'type' => 'to',
					'time' => '03:00pm',
					'message' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit nesciunt suscipit, odio laborum magnam unde saepe voluptatum eius dicta libero expedita, iure iusto vero! Debitis quod ipsam error inventore beatae.'
				],
			],
			date('M j, Y') === 'Sep 1, 2024' ? 'Today' : (date_diff(new DateTime('now'), new DateTime('Sep 1, 2024'))->days === 1 ? 'Yesterday' : 'Sep 1, 2024') => [
				[
					'type' => 'to',
					'time' => '09:03am',
					'message' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem doloribus exercitationem iusto modi quia minus, quae commodi quidem illum nesciunt iure? Aut incidunt eaque esse vero officiis similique iusto nihil!'
				],
				[
					'type' => 'to',
					'time' => '11:01pm',
					'message' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas, qui. Velit excepturi suscipit impedit expedita officiis qui quae delectus odit aspernatur. Tempore incidunt autem non animi vitae soluta dolore inventore!'
				],
			],
		],
	],
	[
		'id' => 3,
		'name' => 'brook stones',
		'is_friend' => true,
		'location' => 'Lagos',
		'messages' => [
			date('M j, Y') === 'Aug 28, 2024' ? 'Today' : (date_diff(new DateTime('now'), new DateTime('Aug 28, 2024'))->days === 1 ? 'Yesterday' : 'Aug 28, 2024') => [
				[
					'type' => 'from',
					'time' => '06:13am',
					'message' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eos, consequatur quaerat? Dignissimos, iure nihil accusantium perspiciatis praesentium velit voluptates ipsam hic blanditiis? Est inventore quisquam eius eveniet itaque soluta ullam?'
				],
				[
					'type' => 'to',
					'time' => '03:00pm',
					'message' =>
					'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit optio consequatur aspernatur earum ducimus, voluptate voluptates molestiae repellat qui non iure vitae iste nihil ab illum aliquam deserunt quam maxime!'
				],
			],
			date('M j, Y') === 'Sep 1, 2024' ? 'Today' : (date_diff(new DateTime('now'), new DateTime('Sep 1, 2024'))->days === 1 ? 'Yesterday' : 'Sep 1, 2024') => [
				[
					'type' => 'from',
					'time' => '09:03am',
					'message' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Beatae dolor commodi ipsa illum, ut debitis suscipit a maxime, perspiciatis error labore iure temporibus hic at, iusto qui amet quo atque!'
				],
				[
					'type' => 'to',
					'time' => '11:01pm',
					'message' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit ullam nisi commodi ea sapiente cumque aperiam quisquam quaerat aliquam. Facere quasi sit harum ipsam illum doloremque dolor beatae hic nihil?'
				],
			],
		],
	],
];

/* foreach ($chat_messages as $key => $chat_message) {
	echo '<pre>';
	echo json_encode($chat_message);
	echo '</pre>';
} */
// exit;
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Chat App</title>

	<link rel="stylesheet" href="<?= asset('plugins/fontawesome/css/all.css') ?>">
	<link rel="stylesheet" href="<?= asset('plugins/fuxcel/css/fuxcel.css') ?>">

	<link rel="stylesheet" href="<?= asset('css/app.css') ?>">

	<script src="<?= asset('plugins/fuxcel/js/fuxcel.js') ?>" defer></script>
	<script src="<?= asset('js/app.js') ?>" defer></script>
</head>

<body>
	<main>
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
				<?php foreach ($chat_messages as $chat_message): ?>
					<a href="" class="chat-friend" data-messages='<?php echo json_encode($chat_message); ?>'>
						<div class="chat-friend-img"><i class="fa fa-3x fa-user-circle"></i></div>
						<div class="chat-friend-info">
							<span class="name" title="<?= $chat_message['name']; ?>"><?= $chat_message['name']; ?></span>
							<div>
								<span class="message" title="<?= end($chat_message['messages'][array_key_last($chat_message['messages'])])['message']; ?>">
									<span class="date">
										<?= array_key_last($chat_message['messages']); ?>
									</span>
									&bull;
									<?= end($chat_message['messages'][array_key_last($chat_message['messages'])])['message']; ?>
								</span>
							</div>
						</div>
					</a>
				<?php endforeach; ?>
			</section>

			<section id="chat-requests" class="left-menu">
				<h3 style="padding: .5rem;margin: 0;">Chat Requests</h3>
				<?php foreach ($chat_messages as $chat_message): ?>
					<a href="" class="chat-friend" data-messages='<?php echo json_encode($chat_message); ?>'>
						<div class="chat-friend-img"><i class="fa fa-3x fa-user-circle"></i></div>
						<div class="chat-friend-info">
							<span class="name" title="<?= $chat_message['name']; ?>"><?= $chat_message['name']; ?></span>
							<div>
								<span class="message" title="<?= end($chat_message['messages'][array_key_last($chat_message['messages'])])['message']; ?>">
									<span class="date">
										<?= array_key_last($chat_message['messages']); ?>
									</span>
									&bull;
									<?= end($chat_message['messages'][array_key_last($chat_message['messages'])])['message']; ?>
								</span>
							</div>
						</div>
					</a>
				<?php endforeach; ?>
			</section>

			<section id="chat-archives" class="left-menu">
				<h3 style="padding: .5rem;margin: 0;">Archived</h3>
				<?php foreach ($chat_messages as $chat_message): ?>
					<a href="" class="chat-friend" data-messages='<?php echo json_encode($chat_message); ?>'>
						<div class="chat-friend-img"><i class="fa fa-3x fa-user-circle"></i></div>
						<div class="chat-friend-info">
							<span class="name" title="<?= $chat_message['name']; ?>"><?= $chat_message['name']; ?></span>
							<div>
								<span class="message" title="<?= end($chat_message['messages'][array_key_last($chat_message['messages'])])['message']; ?>">
									<span class="date">
										<?= array_key_last($chat_message['messages']); ?>
									</span>
									&bull;
									<?= end($chat_message['messages'][array_key_last($chat_message['messages'])])['message']; ?>
								</span>
							</div>
						</div>
					</a>
				<?php endforeach; ?>
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
	</main>
</body>

</html>
