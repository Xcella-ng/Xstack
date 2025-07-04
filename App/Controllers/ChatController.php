<?php

namespace App\Controllers;

use DateTime;
use Hodos\Base\Request;

class ChatController extends Controller
{
	public function show(Request $request)
	{
		// global $errorKeys;
		$request->add('errorKeys', []);
		$validator = $request->validate([
			'id' => ['required', 'email', 'string', 'date:m-d-Y'],
			'name_bass' => ['required', 'array'],
		]);
		
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
							'message' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus autem consequuntur, repellat amet id nemo temporibus dolorem magni. Rerum incidunt maxime aliquam voluptates quod quae amet? Ut ratione soluta cupiditate.',
						],
						[
							'type' => 'from',
							'time' => '10:05am',
							'message' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam, ea praesentium eligendi inventore quos facere ab blanditiis perspiciatis deserunt, aliquid tenetur cum eaque voluptatibus adipisci harum nostrum possimus sunt? Non.',
						],
					],
					date('M j, Y') === 'Aug 31, 2024' ? 'Today' : (date_diff(new DateTime('now'), new DateTime('Aug 31, 2024'))->days === 1 ? 'Yesterday' : 'Aug 31, 2024') => [
						[
							'type' => 'from',
							'time' => '10:00am',
							'message' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus autem consequuntur, repellat amet id nemo temporibus dolorem magni. Rerum incidunt maxime aliquam voluptates quod quae amet? Ut ratione soluta cupiditate.',
						],
						[
							'type' => 'to',
							'time' => '10:05am',
							'message' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam, ea praesentium eligendi inventore quos facere ab blanditiis perspiciatis deserunt, aliquid tenetur cum eaque voluptatibus adipisci harum nostrum possimus sunt? Non.',
						],
					],
					date('M j, Y') === 'Sep 1, 2024' ? 'Today' : (date_diff(new DateTime('now'), new DateTime('Sep 1, 2024'))->days === 1 ? 'Yesterday' : 'Sep 1, 2024') => [
						[
							'type' => 'to',
							'time' => '07:00pm',
							'message' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates blanditiis perspiciatis natus fugit explicabo nihil enim, consequatur dolorem! Nisi pariatur itaque sit perspiciatis laborum sequi a deleniti architecto natus neque.',
						],
						[
							'type' => 'from',
							'time' => '09:12pm',
							'message' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias voluptate reiciendis magnam atque eos ut ipsa odio praesentium? A mollitia, odit autem harum modi culpa est non inventore commodi. Ullam?',
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
							'message' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Totam nisi ut quidem neque eum porro ad praesentium iure provident, optio incidunt voluptate quae a molestiae debitis? Rerum eveniet delectus quibusdam?',
						],
						[
							'type' => 'to',
							'time' => '03:00pm',
							'message' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit nesciunt suscipit, odio laborum magnam unde saepe voluptatum eius dicta libero expedita, iure iusto vero! Debitis quod ipsam error inventore beatae.',
						],
					],
					date('M j, Y') === 'Sep 1, 2024' ? 'Today' : (date_diff(new DateTime('now'), new DateTime('Sep 1, 2024'))->days === 1 ? 'Yesterday' : 'Sep 1, 2024') => [
						[
							'type' => 'to',
							'time' => '09:03am',
							'message' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem doloribus exercitationem iusto modi quia minus, quae commodi quidem illum nesciunt iure? Aut incidunt eaque esse vero officiis similique iusto nihil!',
						],
						[
							'type' => 'to',
							'time' => '11:01pm',
							'message' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas, qui. Velit excepturi suscipit impedit expedita officiis qui quae delectus odit aspernatur. Tempore incidunt autem non animi vitae soluta dolore inventore!',
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
							'message' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eos, consequatur quaerat? Dignissimos, iure nihil accusantium perspiciatis praesentium velit voluptates ipsam hic blanditiis? Est inventore quisquam eius eveniet itaque soluta ullam?',
						],
						[
							'type' => 'to',
							'time' => '03:00pm',
							'message' =>
								'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit optio consequatur aspernatur earum ducimus, voluptate voluptates molestiae repellat qui non iure vitae iste nihil ab illum aliquam deserunt quam maxime!',
						],
					],
					date('M j, Y') === 'Sep 1, 2024' ? 'Today' : (date_diff(new DateTime('now'), new DateTime('Sep 1, 2024'))->days === 1 ? 'Yesterday' : 'Sep 1, 2024') => [
						[
							'type' => 'from',
							'time' => '09:03am',
							'message' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Beatae dolor commodi ipsa illum, ut debitis suscipit a maxime, perspiciatis error labore iure temporibus hic at, iusto qui amet quo atque!',
						],
						[
							'type' => 'to',
							'time' => '11:01pm',
							'message' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit ullam nisi commodi ea sapiente cumque aperiam quisquam quaerat aliquam. Facere quasi sit harum ipsam illum doloremque dolor beatae hic nihil?',
						],
					],
				],
			],
		];
		return view('index', ['error' => $validator, ...compact('chat_messages')]);
	}
}
