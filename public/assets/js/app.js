(() => {
	Fuxcel.path = 'http://localhost/messenger/assets/plugins/fuxcel';

	let documentHeight = window.innerHeight,
		documentWidth = window.innerWidth,

		leftMenu = '.left-menu',

		chatNav = 'nav',
		chatContacts = '#chat-contacts',
		chatSpace = '#chat-space',

		chatFriends = '.chat-friend',

		chatBodyMain = `${chatSpace} .chat-space-body`,
		chatBody = `${chatBodyMain} .chats`,
		chatBodyBottom = `${chatSpace} .chat-space-bottom`;

	const isSmallScreen = () => documentWidth < 992;

	const dynamicChatBox = () => {
		const _chatNav = fx(chatNav);
		const _chatSpace = fx(chatSpace);
		const _chatBodyMain = fx(chatBodyMain);
		const _chatBody = fx(chatBody);

		const navHeight = _chatNav[0].getBoundingClientRect().height;
		_chatSpace.style({height: `${documentHeight - navHeight}px`});
	}

	const menuToggleActions = () => {
		const _chatBodyMain = fx(chatBodyMain);
		const _chatContacts = fx(chatContacts);
		const _chatFriends = fx(chatFriends);

		const _leftMenus = fx(leftMenu);
		const _leftMenuTogglers = fx('.left-menu-toggler');

		let chatContactsRect = _chatContacts[0].getBoundingClientRect();

		_leftMenuTogglers.off().upon('click', function (e) {
			e.preventDefault();
			const toggler = fx(e.currentTarget);
			const dataId = toggler.dataAttrib('id');
			const _target = fx(dataId);

			if (!toggler.classes.contains('active')) {
				const transitionTime = parseFloat(_leftMenus.style('transition').split('s')[0]) * 1000;

				_target.slideoutleft(0).then(element => {
					_leftMenus.removeClass('active');
					element.putClass('active').slideinleft(transitionTime);
				});
				_leftMenuTogglers.removeClass('active');
				toggler.putClass('active');
			} else
				(isSmallScreen() && _target.classes.contains('opened')) && _target.slideinleft().then(element => element.removeClass('opened'));
			!fx(chatBody).classes.contains('active') && _chatFriends.removeClass('active');
		});

		_chatBodyMain.off().upon('contextmenu', function (e) {
			e.preventDefault();
			fx('.contextmenu').removeClass('active');
		});

		_chatFriends.off().upon({
			click: function (e) {
				e.preventDefault();
				const _chatFriend = fx(e.currentTarget);
				const _chatMenu = fx(_chatFriend.parents(leftMenu));
				const _currentChatFriends = fx(_chatFriends, _chatMenu);

				_chatFriends.removeClass('active');
				_chatFriend.putClass('active');

				setTimeout(() => {
					if (isSmallScreen())
						!_chatMenu.classes.contains('opened') && _chatMenu.slideoutleft().then(element => {
							_leftMenus.removeClass('opened');
							_chatMenu.putClass('opened');
						});
				}, 300);

				let chatInfo,
					chatFriendMessages = '';
				const chatMessages = JSON.parse(_chatFriend.dataAttrib('messages'));

				if (typeof chatMessages === 'object')
					if (Object.keys(chatMessages).length) {
						chatInfo = `
							<i class="fa fa-4x fa-user-circle"></i>
							<h4 style="text-transform: capitalize">${chatMessages.name}</h4>

							<span>${chatMessages.is_friend ? `You're friends` : `You're not friends`}</span>
							<span>${chatMessages.location.length ? `Lives in ${chatMessages.location}` : 'Location not set'}</span>
							<span>Studied at UNKNWON</span>

							<p><a href="">View profile</a></p>
						`;

						Object.keys(chatMessages.messages).forEach((chatMessage, idx) => {
							let messages = '';
							const messagesWrapper = (allMessages) => `
								<div style = "display: flex;flex-direction: column;margin-bottom: 1rem">
									<div style="display: flex;justify-content: center;align-items: center;">\
										<span style="background-color: gray;border-radius: 1rem;padding: .2rem .4rem; color: white;font-size: 12px">${chatMessage}</span>\
									</div>
									<div style="display: flex;flex-direction: column;margin-top: .5rem;">
										${allMessages}
									</div>
								</div>
							`;

							Object.keys(chatMessages.messages[chatMessage]).forEach((message, idxSub) => {
								const messageContent = chatMessages.messages[chatMessage][message];
								const contextMenu = () =>
									messageContent.type === 'from' ? `
										<div data-target="#${idx}${idxSub}" class="contextmenu">
											<a href="#"><i class="far fa-copy"></i> Copy</a>
											<a href="#"><i class="far fa-reply"></i> Reply</a>
											<a href="#"><i class="far fa-trash"></i> Delete for yourself</a>
										</div>
									` : `
										<div data-target="#${idx}${idxSub}" class="contextmenu">
											<a href="#"><i class="fa fa-copy"></i> Copy</a>
											<a href="#">Reply</a>
											<a href="#">Delete for everyone</a>
											<a href="#">Delete for yourself</a>
										</div>
								`;

								messages += `
									<div id="${idx}${idxSub}" class="chat-message-content ${messageContent.type}" style="display: flex;flex-direction: column;max-width: ${isSmallScreen() ? '85' : '70'}%;background-color: lightgray;padding: .5rem .8rem;margin-bottom: 1rem;margin-${messageContent.type === 'from' ? 'right' : 'left'}: auto;border-radius: 1rem;position: relative">
										<div>${messageContent.message}</div>
										<p style="margin-left: auto;font-size: 10px">${messageContent.time}</p>
										${contextMenu()}
									</div>
								`;
							});
							chatFriendMessages += messagesWrapper(messages);
						});
					}

				fx('.chat-top .bio').insertHTML(chatInfo);

				if (chatFriendMessages) {
					fx('.chat-main').insertHTML(chatFriendMessages);
					fx(chatBody).putClass('active');

					fx('.chat-message-content').off().upon('contextmenu', function (e) {
						e.preventDefault();
						const _this = fx(this);
						// console.log(this);
						if (_this.matchSelector('.from'))
							// fx('.contextmenu', _this)
							_this.children('.contextmenu').putClass('active');
						else
							console.log('to');
					})
				} else
					fx(chatBody).removeClass('active');
			},
			contextmenu: function (e) {
				e.preventDefault();
				console.log(e.currentTarget);
			}
		});
	}

	fx('form').off().upon('submit', function (e) {
		e.preventDefault();
		const form = fx(e.currentTarget);
		console.log(fx('[contenteditable]', form).innerText);
	});

	fx(document).off('click').upon('click', function (e) {
		const target = fx(e.target);
		if (!target.matchSelector('.contextmenu') && !target.parents('.contextmenu').length)
			fx('.contextmenu').length && fx('.contextmenu').removeClass('active');
	})

	window.onresize = () => {
		documentHeight = window.innerHeight;
		documentWidth = window.innerWidth;

		dynamicChatBox();
		menuToggleActions();
	}

	const errorBag = JSON.parse(fx('#error-bag').dataAttrib('errors'));

	Object.keys(errorBag).forEach(key => {
		fx(fx('.name')[0]).insertHTML(`<div>${errorBag[key]}</div>`, 'postfix');
	});
	dynamicChatBox();
	menuToggleActions();
})();
