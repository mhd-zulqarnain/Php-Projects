var Facebook, Twitter, Google, VKontakte, Odnoklassniki;

(function ($) {
	'use strict';

	$.ajaxSetup({ cache: true });

	var InterfaceSocial;

	/**
	 * This function do function interface
	 */
	InterfaceSocial = function () {
		this.element;
		this.config;
		this.events = {
			success: [],
			fail: []
		};
	};

	/**
	 * This function do set element
	 *
	 * @param: jQuery|String element;
	 *
	 * @return: InterfaceSocial;
	 */
	InterfaceSocial.prototype.setElement = function (element) {
		this.element = element;

		return this;
	};

	/**
	 * This function do set config
	 *
	 * @param: Object config;
	 *
	 * @return: InterfaceSocial;
	 */
	InterfaceSocial.prototype.setConfig = function (config) {
		this.config = config;

		return this;
	};

	/**
	 * This function do subscribe on events
	 *
	 * @param: String name (success|fail);
	 * @param: Function callback;
	 *
	 * @return: InterfaceSocial;
	 */
	InterfaceSocial.prototype.on = function (name, callback) {
		if (this.events[name] !== undefined) {
			this.events[name] = callback;
		};

		return this;
	};

	/**
	 * This function do run callback by name event
	 *
	 * @param: String name;
	 * @param: Object args;
	 *
	 * @return: InterfaceSocial;
	 */
	InterfaceSocial.prototype.run = function (name, args) {
		if (this.events[name] !== undefined) {
			this.events[name](args);
		};

		return this;
	};


	Facebook = function () {
		InterfaceSocial.call(this);

	};

	Facebook.prototype = Object.create(InterfaceSocial.prototype);
	Facebook.prototype.constructor = Facebook;

	/**
	 * This function do init start lisen click on element
	 */
	Facebook.prototype.flush = function () {
		var self = this;

		if (this.config.appId === undefined) {
			console.error("Config required appId");
		}
		if (this.config.href === undefined) {
			console.error("Config required href");
		}
		if (this.config.text === undefined) {
			console.error("Config required text");
		}
		if (this.element === undefined) {
			console.error("required element");
		}

		$.getScript('//connect.facebook.net/en_US/sdk.js', function () {
			FB.init({
				appId: self.config.appId,
				version: 'v2.3'
			});

			$(self.element).click(function (e) {
				e.preventDefault();

				FB.ui({
					method: 'feed',
					link: self.config.href,
					caption: self.config.text
				}, function (result) {
					if (result !== null && result !== undefined) {
						self.run('success', { post_id: result.post_id });
					} else {
						self.run('fail');
					}
				});
			});
		});
	};

	Twitter = function () {
		InterfaceSocial.call(this);
	};
	Twitter.prototype = Object.create(InterfaceSocial.prototype);
	Twitter.prototype.constructor = Twitter;

	Twitter.prototype.on = function (name, callback) {
		if (name === 'fail') { console.error('Twitter not support fail event'); return this; }

		if (this.events[name] !== undefined) {
			this.events[name] = callback;
		};

		return this;
	};

	Twitter.prototype.flush = function () {
		var self = this;

		if (this.config.href === undefined) {
			console.error("Config required href");
		}
		if (this.config.text === undefined) {
			console.error("Config required text");
		}
		if (this.element === undefined) {
			console.error("required element");
		}

		$.getScript('https://platform.twitter.com/widgets.js', function () {
			var span = $('<span>'),
				element = $(self.element);

			span.css({
				opacity: 0,
				width: '100%',
				height: '100%',
				position: 'absolute',
				display: 'block',
				top: 0,
				left: 0
			});

			element.css({
				overflow: 'hidden',
				position: 'relative'
			});

			element.append(span);

			twttr.widgets.createShareButton(
				self.config.href,
				span[0],
				{
					count: 'none',
					text: self.config.text,
					size: 'large'
				}).then(function (el) {
				$(el).css({
					position: 'absolute',
					top: '0',
					left: '0',
					width: '100%',
					height: '100%'
				});
			});

			twttr.events.bind('tweet', function () {
				self.run('success', {});
			});
		});
	};

	Google = function () {
		InterfaceSocial.call(this);

	};

	Google.prototype = Object.create(InterfaceSocial.prototype);
	Google.prototype.constructor = Google;

	Google.prototype.flush = function () {
		var self = this;

		if (this.config.href === undefined) {
			console.error("Config required href");
		}
		if (this.element === undefined) {
			console.error("required element");
		}

		$.getScript('https://apis.google.com/js/client:plusone.js', function () {
			var span = $('<span>'),
				element = $(self.element);

			element.css({
				overflow: 'hidden',
				position: 'relative'
			});
			element.append(span);

			span.css({
				opacity: 0,
				display: 'block',
				position: 'absolute',
				left: 0,
				top: 0
			});

			gapi.plusone.render(
				span[0],
				{
					"size": "standard",
					"count": "false",
					"callback": function(o) {
						if(o.state === 'on') {
							self.run('success', o);
						} else {
							self.run('fail', o);
						}
					},
					"href": self.config.href
				}
			);

		});
	};

	VKontakte = function () {
		InterfaceSocial.call(this);

	};

	VKontakte.prototype = Object.create(InterfaceSocial.prototype);
	VKontakte.prototype.constructor = VKontakte;

	VKontakte.prototype.flush = function () {
		var self = this;

		if (this.config.appId === undefined) {
			console.error("Config required appId");
		}
		if (this.config.href === undefined) {
			console.error("Config required href");
		}
		if (this.element === undefined) {
			console.error("required element");
		}
		if (this.config.text === undefined) {
			console.error("Config required text");
		}

		$.getScript('//vk.com/js/api/openapi.js?113', function () {
			var span = $('<span>'),
				span2 = $('<span>'),
				id = 'vk-' + Date.now(),
				element = $(self.element);

			span.css({
				opacity: 0,
				width: '100%',
				height: '100%',
				position: 'absolute',
				display: 'block',
				top: 0,
				left: 0
			});

			element.css({
				overflow: 'hidden',
				position: 'relative'
			});

			span2.attr("id", id).css('margin-left', '-50px');

			element.append(span.append(span2));

			VK.init({apiId: self.config.appId, onlyWidgets: true});

			VK.Widgets.Like(id, {
				type: "button",
				text: self.config.text,
				height: 24
			});

			VK.Observer.subscribe("widgets.like.shared", function() {
				self.run('success');
			});
			VK.Observer.subscribe("widgets.like.unshared", function() {
				self.run('fail');
			});
		});
	};

	Odnoklassniki = function () {
		InterfaceSocial.call(this);

	};

	Odnoklassniki.prototype = Object.create(InterfaceSocial.prototype);
	Odnoklassniki.prototype.constructor = Odnoklassniki;

	Odnoklassniki.prototype.on = function (name, callback) {
		if (name === 'fail') { console.error('Odnoklassniki not support fail event'); return this; }

		if (this.events[name] !== undefined) {
			this.events[name] = callback;
		};

		return this;
	};

	Odnoklassniki.prototype.flush = function () {
		var self = this;

		if (this.config.href === undefined) {
			console.error("Config required href");
		}
		if (this.element === undefined) {
			console.error("required element");
		}

		$.getScript('http://connect.ok.ru/connect.js', function () {
			var span = $('<span>'),
				span2 = $('<span>'),
				id = 'ok-' + Date.now(),
				element = $(self.element);

			span.css({
				opacity: 0,
				width: '100%',
				height: '100%',
				position: 'absolute',
				display: 'block',
				top: 0,
				left: 0
			});

			element.css({
				overflow: 'hidden',
				position: 'relative'
			});

			span2.attr("id", id);

			element.append(span.append(span2));

			OK.CONNECT.insertShareWidget(id, self.config.href, "{st:'oval',sz:30,ck:1}");

			function listenForShare() {
				if (window.addEventListener) {
					window.addEventListener('message', onShare, false);
				} else {
					window.attachEvent('onmessage', onShare);
				}
			}
			function onShare(e) {
				if(e.origin === 'http://connect.ok.ru') {
					var args = e.data.split("$");
					if (args[0] == "ok_shared") {
						self.run('success', {id: args[1]});
					}
				}
			}
			listenForShare();
		});
	};

	$.fn.SocialShare = function(data) {
		var setting = $.extend({
			success: function() {},
			fail: function() {}
		}, data);

		$(this).each(function() {
			var self = $(this),
				driver,
				odriver,
				text,
				appId,
				href;

			driver = self.attr('data-social');

			text = self.attr('data-text');
			appId = self.attr('data-appid');
			href = self.attr('data-url');

			text = text || '';
			href = href || location.href;

			if(driver === 'facebook') {
				odriver = new Facebook();
				odriver.on('success', setting.success);
				odriver.on('fail', setting.fail);
			} else if(driver === 'twitter') {
				odriver = new Twitter();
				odriver.on('success', setting.success);
			} else if(driver === 'google') {
				odriver = new Google();
				odriver.on('success', setting.success);
				odriver.on('fail', setting.fail);
			} else if(driver === 'vk') {
				odriver = new VKontakte();
				odriver.on('success', setting.success);
				odriver.on('fail', setting.fail);
			} else if(driver === 'ok') {
				odriver = new Odnoklassniki();
				odriver.on('success', setting.success);
			}

			odriver.setElement(self);
			odriver.setConfig({
				appId: appId,
				text: text,
				href: href
			});

			odriver.flush();
		});
	};

} (jQuery));
