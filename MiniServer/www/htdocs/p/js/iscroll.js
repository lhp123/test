/**ഀ਍ ⨀  ഍
 * Find more about the scrolling function atഀ਍ ⨀ 栀琀琀瀀㨀⼀⼀挀甀戀椀焀⸀漀爀最⼀椀猀挀爀漀氀氀 ഍
 *ഀ਍ ⨀ 䌀漀瀀礀爀椀最栀琀 ⠀挀⤀ ㈀　㄀　 䴀愀琀琀攀漀 匀瀀椀渀攀氀氀椀Ⰰ 栀琀琀瀀㨀⼀⼀挀甀戀椀焀⸀漀爀最⼀ ഍
 * Released under MIT licenseഀ਍ ⨀ 栀琀琀瀀㨀⼀⼀挀甀戀椀焀⸀漀爀最⼀搀爀漀瀀戀漀砀⼀洀椀琀ⴀ氀椀挀攀渀猀攀⸀琀砀琀 ഍
 * ഀ਍ ⨀ 嘀攀爀猀椀漀渀 ㌀⸀㘀 ⴀ 䰀愀猀琀 甀瀀搀愀琀攀搀㨀 ㈀　㄀　⸀　㠀⸀㈀㐀 ഍
 * ഀ਍ ⨀⼀ ഍
ഀ਍⠀昀甀渀挀琀椀漀渀⠀⤀笀 ഍
function iScroll (el, options) {ഀ਍ऀ瘀愀爀 琀栀愀琀 㴀 琀栀椀猀Ⰰ 椀㬀 ഍
	that.element = typeof el == 'object' ? el : document.getElementById(el);ഀ਍ऀ琀栀愀琀⸀眀爀愀瀀瀀攀爀 㴀 琀栀愀琀⸀攀氀攀洀攀渀琀⸀瀀愀爀攀渀琀一漀搀攀㬀 ഍
ഀ਍ऀ琀栀愀琀⸀攀氀攀洀攀渀琀⸀猀琀礀氀攀⸀眀攀戀欀椀琀吀爀愀渀猀椀琀椀漀渀倀爀漀瀀攀爀琀礀 㴀 ✀ⴀ眀攀戀欀椀琀ⴀ琀爀愀渀猀昀漀爀洀✀㬀 ഍
	that.element.style.webkitTransitionTimingFunction = 'cubic-bezier(0,0,0.25,1)';ഀ਍ऀ琀栀愀琀⸀攀氀攀洀攀渀琀⸀猀琀礀氀攀⸀眀攀戀欀椀琀吀爀愀渀猀椀琀椀漀渀䐀甀爀愀琀椀漀渀 㴀 ✀　✀㬀 ഍
	that.element.style.webkitTransform = translateOpen + '0,0' + translateClose;ഀ਍ ഍
	// Default optionsഀ਍ऀ琀栀愀琀⸀漀瀀琀椀漀渀猀 㴀 笀 ഍
		bounce: has3d,ഀ਍ऀऀ洀漀洀攀渀琀甀洀㨀 栀愀猀㌀搀Ⰰ ഍
		checkDOMChanges: true,ഀ਍ऀऀ琀漀瀀伀渀䐀伀䴀䌀栀愀渀最攀猀㨀 昀愀氀猀攀Ⰰ ഍
		hScrollbar: has3d,ഀ਍ऀऀ瘀匀挀爀漀氀氀戀愀爀㨀 栀愀猀㌀搀Ⰰ ഍
		fadeScrollbar: isIphone || isIpad || !isTouch,ഀ਍ऀऀ猀栀爀椀渀欀匀挀爀漀氀氀戀愀爀㨀 椀猀䤀瀀栀漀渀攀 簀簀 椀猀䤀瀀愀搀 簀簀 ℀椀猀吀漀甀挀栀Ⰰ ഍
		desktopCompatibility: false,ഀ਍ऀऀ漀瘀攀爀昀氀漀眀㨀 ✀栀椀搀搀攀渀✀Ⰰ ഍
		snap: falseഀ਍ऀ紀㬀 ഍
	ഀ਍ऀ⼀⼀ 唀猀攀爀 搀攀昀椀渀攀搀 漀瀀琀椀漀渀猀 ഍
	if (typeof options == 'object') {ഀ਍ऀऀ昀漀爀 ⠀椀 椀渀 漀瀀琀椀漀渀猀⤀ 笀 ഍
			that.options[i] = options[i];ഀ਍ऀऀ紀 ഍
	}ഀ਍ ഍
	if (that.options.desktopCompatibility) {ഀ਍ऀऀ琀栀愀琀⸀漀瀀琀椀漀渀猀⸀漀瘀攀爀昀氀漀眀 㴀 ✀栀椀搀搀攀渀✀㬀 ഍
	}ഀ਍ऀ ഍
	that.wrapper.style.overflow = that.options.overflow;ഀ਍ऀ ഍
	that.refresh();ഀ਍ ഍
	window.addEventListener('onorientationchange' in window ? 'orientationchange' : 'resize', that, false);ഀ਍ ഍
	if (isTouch || that.options.desktopCompatibility) {ഀ਍ऀऀ琀栀愀琀⸀攀氀攀洀攀渀琀⸀愀搀搀䔀瘀攀渀琀䰀椀猀琀攀渀攀爀⠀匀吀䄀刀吀开䔀嘀䔀一吀Ⰰ 琀栀愀琀Ⰰ 昀愀氀猀攀⤀㬀 ഍
		that.element.addEventListener(MOVE_EVENT, that, false);ഀ਍ऀऀ琀栀愀琀⸀攀氀攀洀攀渀琀⸀愀搀搀䔀瘀攀渀琀䰀椀猀琀攀渀攀爀⠀䔀一䐀开䔀嘀䔀一吀Ⰰ 琀栀愀琀Ⰰ 昀愀氀猀攀⤀㬀 ഍
	}ഀ਍ऀ ഍
	if (that.options.checkDOMChanges) {ഀ਍ऀऀ琀栀愀琀⸀攀氀攀洀攀渀琀⸀愀搀搀䔀瘀攀渀琀䰀椀猀琀攀渀攀爀⠀✀䐀伀䴀匀甀戀琀爀攀攀䴀漀搀椀昀椀攀搀✀Ⰰ 琀栀愀琀Ⰰ 昀愀氀猀攀⤀㬀 ഍
	}ഀ਍紀 ഍
ഀ਍椀匀挀爀漀氀氀⸀瀀爀漀琀漀琀礀瀀攀 㴀 笀 ഍
	x: 0,ഀ਍ऀ礀㨀 　Ⰰ ഍
	enabled: true,ഀ਍ ഍
	handleEvent: function (e) {ഀ਍ऀऀ瘀愀爀 琀栀愀琀 㴀 琀栀椀猀㬀 ഍
ഀ਍ऀऀ猀眀椀琀挀栀 ⠀攀⸀琀礀瀀攀⤀ 笀 ഍
			case START_EVENT:ഀ਍ऀऀऀऀ琀栀愀琀⸀琀漀甀挀栀匀琀愀爀琀⠀攀⤀㬀 ഍
				break;ഀ਍ऀऀऀ挀愀猀攀 䴀伀嘀䔀开䔀嘀䔀一吀㨀 ഍
				that.touchMove(e);ഀ਍ऀऀऀऀ戀爀攀愀欀㬀 ഍
			case END_EVENT:ഀ਍ऀऀऀऀ琀栀愀琀⸀琀漀甀挀栀䔀渀搀⠀攀⤀㬀 ഍
				break;ഀ਍ऀऀऀ挀愀猀攀 ✀眀攀戀欀椀琀吀爀愀渀猀椀琀椀漀渀䔀渀搀✀㨀 ഍
				that.transitionEnd();ഀ਍ऀऀऀऀ戀爀攀愀欀㬀 ഍
			case 'orientationchange':ഀ਍ऀऀऀ挀愀猀攀 ✀爀攀猀椀稀攀✀㨀 ഍
				that.refresh();ഀ਍ऀऀऀऀ戀爀攀愀欀㬀 ഍
			case 'DOMSubtreeModified':ഀ਍ऀऀऀऀ琀栀愀琀⸀漀渀䐀伀䴀䴀漀搀椀昀椀攀搀⠀攀⤀㬀 ഍
				break;ഀ਍ऀऀ紀 ഍
	},ഀ਍ऀ ഍
	onDOMModified: function (e) {ഀ਍ऀऀ瘀愀爀 琀栀愀琀 㴀 琀栀椀猀㬀 ഍
ഀ਍ऀऀ⼀⼀ ⠀䠀漀瀀攀昀甀氀氀礀⤀ 攀砀攀挀甀琀攀 漀渀䐀伀䴀䴀漀搀椀昀椀攀搀 漀渀氀礀 漀渀挀攀 ഍
		if (e.target.parentNode != that.element) {ഀ਍ऀऀऀ爀攀琀甀爀渀㬀 ഍
		}ഀ਍ ഍
		setTimeout(function () { that.refresh(); }, 0);ഀ਍ ഍
		if (that.options.topOnDOMChanges && (that.x!=0 || that.y!=0)) {ഀ਍ऀऀऀ琀栀愀琀⸀猀挀爀漀氀氀吀漀⠀　Ⰰ　Ⰰ✀　✀⤀㬀 ഍
		}ഀ਍ऀ紀Ⰰ ഍
ഀ਍ऀ爀攀昀爀攀猀栀㨀 昀甀渀挀琀椀漀渀 ⠀⤀ 笀 ഍
		var that = this,ഀ਍ऀऀऀ爀攀猀攀琀堀 㴀 琀栀椀猀⸀砀Ⰰ 爀攀猀攀琀夀 㴀 琀栀椀猀⸀礀Ⰰ ഍
			snap;ഀ਍ऀऀ ഍
		that.scrollWidth = that.wrapper.clientWidth;ഀ਍ऀऀ琀栀愀琀⸀猀挀爀漀氀氀䠀攀椀最栀琀 㴀 琀栀愀琀⸀眀爀愀瀀瀀攀爀⸀挀氀椀攀渀琀䠀攀椀最栀琀㬀 ഍
		that.scrollerWidth = that.element.offsetWidth;ഀ਍ऀऀ琀栀愀琀⸀猀挀爀漀氀氀攀爀䠀攀椀最栀琀 㴀 琀栀愀琀⸀攀氀攀洀攀渀琀⸀漀昀昀猀攀琀䠀攀椀最栀琀㬀 ഍
		that.maxScrollX = that.scrollWidth - that.scrollerWidth;ഀ਍ऀऀ琀栀愀琀⸀洀愀砀匀挀爀漀氀氀夀 㴀 琀栀愀琀⸀猀挀爀漀氀氀䠀攀椀最栀琀 ⴀ 琀栀愀琀⸀猀挀爀漀氀氀攀爀䠀攀椀最栀琀㬀 ഍
		that.directionX = 0;ഀ਍ऀऀ琀栀愀琀⸀搀椀爀攀挀琀椀漀渀夀 㴀 　㬀 ഍
ഀ਍ऀऀ椀昀 ⠀琀栀愀琀⸀猀挀爀漀氀氀堀⤀ 笀 ഍
			if (that.maxScrollX >= 0) {ഀ਍ऀऀऀऀ爀攀猀攀琀堀 㴀 　㬀 ഍
			} else if (that.x < that.maxScrollX) {ഀ਍ऀऀऀऀ爀攀猀攀琀堀 㴀 琀栀愀琀⸀洀愀砀匀挀爀漀氀氀堀㬀 ഍
			}ഀ਍ऀऀ紀 ഍
		if (that.scrollY) {ഀ਍ऀऀऀ椀昀 ⠀琀栀愀琀⸀洀愀砀匀挀爀漀氀氀夀 㸀㴀 　⤀ 笀 ഍
				resetY = 0;ഀ਍ऀऀऀ紀 攀氀猀攀 椀昀 ⠀琀栀愀琀⸀礀 㰀 琀栀愀琀⸀洀愀砀匀挀爀漀氀氀夀⤀ 笀 ഍
				resetY = that.maxScrollY;ഀ਍ऀऀऀ紀 ഍
		}ഀ਍ऀऀ⼀⼀ 匀渀愀瀀 ഍
		if (that.options.snap) {ഀ਍ऀऀऀ琀栀愀琀⸀洀愀砀倀愀最攀堀 㴀 ⴀ䴀愀琀栀⸀昀氀漀漀爀⠀琀栀愀琀⸀洀愀砀匀挀爀漀氀氀堀⼀琀栀愀琀⸀猀挀爀漀氀氀圀椀搀琀栀⤀㬀 ഍
			that.maxPageY = -Math.floor(that.maxScrollY/that.scrollHeight);ഀ਍ ഍
			snap = that.snap(resetX, resetY);ഀ਍ऀऀऀ爀攀猀攀琀堀 㴀 猀渀愀瀀⸀砀㬀 ഍
			resetY = snap.y;ഀ਍ऀऀ紀 ഍
ഀ਍ऀऀ椀昀 ⠀爀攀猀攀琀堀℀㴀琀栀愀琀⸀砀 簀簀 爀攀猀攀琀夀℀㴀琀栀愀琀⸀礀⤀ 笀 ഍
			that.setTransitionTime('0');ഀ਍ऀऀऀ琀栀愀琀⸀猀攀琀倀漀猀椀琀椀漀渀⠀爀攀猀攀琀堀Ⰰ 爀攀猀攀琀夀Ⰰ 琀爀甀攀⤀㬀 ഍
		}ഀ਍ऀऀ ഍
		that.scrollX = that.scrollerWidth > that.scrollWidth;ഀ਍ऀऀ琀栀愀琀⸀猀挀爀漀氀氀夀 㴀 ℀琀栀愀琀⸀猀挀爀漀氀氀堀 簀簀 琀栀愀琀⸀猀挀爀漀氀氀攀爀䠀攀椀最栀琀 㸀 琀栀愀琀⸀猀挀爀漀氀氀䠀攀椀最栀琀㬀 ഍
ഀ਍ऀऀ⼀⼀ 唀瀀搀愀琀攀 栀漀爀椀稀漀渀琀愀氀 猀挀爀漀氀氀戀愀爀 ഍
		if (that.options.hScrollbar && that.scrollX) {ഀ਍ऀऀऀ琀栀愀琀⸀猀挀爀漀氀氀䈀愀爀堀 㴀 琀栀愀琀⸀猀挀爀漀氀氀䈀愀爀堀 簀簀 渀攀眀 猀挀爀漀氀氀戀愀爀⠀✀栀漀爀椀稀漀渀琀愀氀✀Ⰰ 琀栀愀琀⸀眀爀愀瀀瀀攀爀Ⰰ 琀栀愀琀⸀漀瀀琀椀漀渀猀⸀昀愀搀攀匀挀爀漀氀氀戀愀爀Ⰰ 琀栀愀琀⸀漀瀀琀椀漀渀猀⸀猀栀爀椀渀欀匀挀爀漀氀氀戀愀爀⤀㬀 ഍
			that.scrollBarX.init(that.scrollWidth, that.scrollerWidth);ഀ਍ऀऀ紀 攀氀猀攀 椀昀 ⠀琀栀愀琀⸀猀挀爀漀氀氀䈀愀爀堀⤀ 笀 ഍
			that.scrollBarX = that.scrollBarX.remove();ഀ਍ऀऀ紀 ഍
ഀ਍ऀऀ⼀⼀ 唀瀀搀愀琀攀 瘀攀爀琀椀挀愀氀 猀挀爀漀氀氀戀愀爀 ഍
		if (that.options.vScrollbar && that.scrollY && that.scrollerHeight > that.scrollHeight) {ഀ਍ऀऀऀ琀栀愀琀⸀猀挀爀漀氀氀䈀愀爀夀 㴀 琀栀愀琀⸀猀挀爀漀氀氀䈀愀爀夀 簀簀 渀攀眀 猀挀爀漀氀氀戀愀爀⠀✀瘀攀爀琀椀挀愀氀✀Ⰰ 琀栀愀琀⸀眀爀愀瀀瀀攀爀Ⰰ 琀栀愀琀⸀漀瀀琀椀漀渀猀⸀昀愀搀攀匀挀爀漀氀氀戀愀爀Ⰰ 琀栀愀琀⸀漀瀀琀椀漀渀猀⸀猀栀爀椀渀欀匀挀爀漀氀氀戀愀爀⤀㬀 ഍
			that.scrollBarY.init(that.scrollHeight, that.scrollerHeight);ഀ਍ऀऀ紀 攀氀猀攀 椀昀 ⠀琀栀愀琀⸀猀挀爀漀氀氀䈀愀爀夀⤀ 笀 ഍
			that.scrollBarY = that.scrollBarY.remove();ഀ਍ऀऀ紀 ഍
	},ഀ਍ ഍
	setPosition: function (x, y, hideScrollBars) {ഀ਍ऀऀ瘀愀爀 琀栀愀琀 㴀 琀栀椀猀㬀 ഍
		ഀ਍ऀऀ琀栀愀琀⸀砀 㴀 砀㬀 ഍
		that.y = y;ഀ਍ ഍
		that.element.style.webkitTransform = translateOpen + that.x + 'px,' + that.y + 'px' + translateClose;ഀ਍ ഍
		// Move the scrollbarsഀ਍ऀऀ椀昀 ⠀℀栀椀搀攀匀挀爀漀氀氀䈀愀爀猀⤀ 笀 ഍
			if (that.scrollBarX) {ഀ਍ऀऀऀऀ琀栀愀琀⸀猀挀爀漀氀氀䈀愀爀堀⸀猀攀琀倀漀猀椀琀椀漀渀⠀琀栀愀琀⸀砀⤀㬀 ഍
			}ഀ਍ऀऀऀ椀昀 ⠀琀栀愀琀⸀猀挀爀漀氀氀䈀愀爀夀⤀ 笀 ഍
				that.scrollBarY.setPosition(that.y);ഀ਍ऀऀऀ紀 ഍
		}ഀ਍ऀ紀Ⰰ ഍
	ഀ਍ऀ猀攀琀吀爀愀渀猀椀琀椀漀渀吀椀洀攀㨀 昀甀渀挀琀椀漀渀⠀琀椀洀攀⤀ 笀 ഍
		var that = this;ഀ਍ऀऀ ഍
		time = time || '0';ഀ਍ऀऀ琀栀愀琀⸀攀氀攀洀攀渀琀⸀猀琀礀氀攀⸀眀攀戀欀椀琀吀爀愀渀猀椀琀椀漀渀䐀甀爀愀琀椀漀渀 㴀 琀椀洀攀㬀 ഍
		ഀ਍ऀऀ椀昀 ⠀琀栀愀琀⸀猀挀爀漀氀氀䈀愀爀堀⤀ 笀 ഍
			that.scrollBarX.bar.style.webkitTransitionDuration = time;ഀ਍ऀऀऀ琀栀愀琀⸀猀挀爀漀氀氀䈀愀爀堀⸀眀爀愀瀀瀀攀爀⸀猀琀礀氀攀⸀眀攀戀欀椀琀吀爀愀渀猀椀琀椀漀渀䐀甀爀愀琀椀漀渀 㴀 栀愀猀㌀搀 ☀☀ 琀栀愀琀⸀漀瀀琀椀漀渀猀⸀昀愀搀攀匀挀爀漀氀氀戀愀爀 㼀 ✀㌀　　洀猀✀ 㨀 ✀　✀㬀 ഍
		}ഀ਍ऀऀ椀昀 ⠀琀栀愀琀⸀猀挀爀漀氀氀䈀愀爀夀⤀ 笀 ഍
			that.scrollBarY.bar.style.webkitTransitionDuration = time;ഀ਍ऀऀऀ琀栀愀琀⸀猀挀爀漀氀氀䈀愀爀夀⸀眀爀愀瀀瀀攀爀⸀猀琀礀氀攀⸀眀攀戀欀椀琀吀爀愀渀猀椀琀椀漀渀䐀甀爀愀琀椀漀渀 㴀 栀愀猀㌀搀 ☀☀ 琀栀愀琀⸀漀瀀琀椀漀渀猀⸀昀愀搀攀匀挀爀漀氀氀戀愀爀 㼀 ✀㌀　　洀猀✀ 㨀 ✀　✀㬀 ഍
		}ഀ਍ऀ紀Ⰰ ഍
		ഀ਍ऀ琀漀甀挀栀匀琀愀爀琀㨀 昀甀渀挀琀椀漀渀⠀攀⤀ 笀 ഍
		var that = this,ഀ਍ऀऀऀ洀愀琀爀椀砀㬀 ഍
ഀ਍ऀऀ攀⸀瀀爀攀瘀攀渀琀䐀攀昀愀甀氀琀⠀⤀㬀 ഍
		e.stopPropagation();ഀ਍ऀऀ ഍
		if (!that.enabled) {ഀ਍ऀऀऀ爀攀琀甀爀渀㬀 ഍
		}ഀ਍ ഍
		that.scrolling = true;		// This is probably not needed, but may be useful if iScroll is used in conjuction with other frameworksഀ਍ ഍
		that.moved = false;ഀ਍ऀऀ琀栀愀琀⸀搀椀猀琀 㴀 　㬀 ഍
ഀ਍ऀऀ琀栀愀琀⸀猀攀琀吀爀愀渀猀椀琀椀漀渀吀椀洀攀⠀✀　✀⤀㬀 ഍
ഀ਍ऀऀ⼀⼀ 䌀栀攀挀欀 椀昀 琀栀攀 猀挀爀漀氀氀攀爀 椀猀 爀攀愀氀氀礀 眀栀攀爀攀 椀琀 猀栀漀甀氀搀 戀攀 ഍
		if (that.options.momentum || that.options.snap) {ഀ਍ऀऀऀ洀愀琀爀椀砀 㴀 渀攀眀 圀攀戀䬀椀琀䌀匀匀䴀愀琀爀椀砀⠀眀椀渀搀漀眀⸀最攀琀䌀漀洀瀀甀琀攀搀匀琀礀氀攀⠀琀栀愀琀⸀攀氀攀洀攀渀琀⤀⸀眀攀戀欀椀琀吀爀愀渀猀昀漀爀洀⤀㬀 ഍
			if (matrix.e != that.x || matrix.f != that.y) {ഀ਍ऀऀऀऀ搀漀挀甀洀攀渀琀⸀爀攀洀漀瘀攀䔀瘀攀渀琀䰀椀猀琀攀渀攀爀⠀✀眀攀戀欀椀琀吀爀愀渀猀椀琀椀漀渀䔀渀搀✀Ⰰ 琀栀愀琀Ⰰ 昀愀氀猀攀⤀㬀 ഍
				that.setPosition(matrix.e, matrix.f);ഀ਍ऀऀऀऀ琀栀愀琀⸀洀漀瘀攀搀 㴀 琀爀甀攀㬀 ഍
			}ഀ਍ऀऀ紀 ഍
ഀ਍ऀऀ琀栀愀琀⸀琀漀甀挀栀匀琀愀爀琀堀 㴀 椀猀吀漀甀挀栀 㼀 攀⸀挀栀愀渀最攀搀吀漀甀挀栀攀猀嬀　崀⸀瀀愀最攀堀 㨀 攀⸀瀀愀最攀堀㬀 ഍
		that.scrollStartX = that.x;ഀ਍ ഍
		that.touchStartY = isTouch ? e.changedTouches[0].pageY : e.pageY;ഀ਍ऀऀ琀栀愀琀⸀猀挀爀漀氀氀匀琀愀爀琀夀 㴀 琀栀愀琀⸀礀㬀 ഍
ഀ਍ऀऀ琀栀愀琀⸀猀挀爀漀氀氀匀琀愀爀琀吀椀洀攀 㴀 攀⸀琀椀洀攀匀琀愀洀瀀㬀 ഍
ഀ਍ऀऀ琀栀愀琀⸀搀椀爀攀挀琀椀漀渀堀 㴀 　㬀 ഍
		that.directionY = 0;ഀ਍ऀ紀Ⰰ ഍
	ഀ਍ऀ琀漀甀挀栀䴀漀瘀攀㨀 昀甀渀挀琀椀漀渀⠀攀⤀ 笀 ഍
		var that = this,ഀ਍ऀऀऀ瀀愀最攀堀 㴀 椀猀吀漀甀挀栀 㼀 攀⸀挀栀愀渀最攀搀吀漀甀挀栀攀猀嬀　崀⸀瀀愀最攀堀 㨀 攀⸀瀀愀最攀堀Ⰰ ഍
			pageY = isTouch ? e.changedTouches[0].pageY : e.pageY,ഀ਍ऀऀऀ氀攀昀琀䐀攀氀琀愀 㴀 琀栀愀琀⸀猀挀爀漀氀氀堀 㼀 瀀愀最攀堀 ⴀ 琀栀愀琀⸀琀漀甀挀栀匀琀愀爀琀堀 㨀 　Ⰰ ഍
			topDelta = that.scrollY ? pageY - that.touchStartY : 0,ഀ਍ऀऀऀ渀攀眀堀 㴀 琀栀愀琀⸀砀 ⬀ 氀攀昀琀䐀攀氀琀愀Ⰰ ഍
			newY = that.y + topDelta;ഀ਍ ഍
		if (!that.scrolling) {ഀ਍ऀऀऀ爀攀琀甀爀渀㬀 ഍
		}ഀ਍ ഍
		//e.preventDefault();ഀ਍ऀऀ攀⸀猀琀漀瀀倀爀漀瀀愀最愀琀椀漀渀⠀⤀㬀ऀ⼀⼀ 匀琀漀瀀瀀椀渀最 瀀爀漀瀀愀最愀琀椀漀渀 樀甀猀琀 猀愀瘀攀猀 猀漀洀攀 挀瀀甀 挀礀挀氀攀猀 ⠀䤀 瀀爀攀猀甀洀攀⤀ ഍
ഀ਍ऀऀ琀栀愀琀⸀琀漀甀挀栀匀琀愀爀琀堀 㴀 瀀愀最攀堀㬀 ഍
		that.touchStartY = pageY;ഀ਍ ഍
		// Slow down if outside of the boundariesഀ਍ऀऀ椀昀 ⠀渀攀眀堀 㸀㴀 　 簀簀 渀攀眀堀 㰀 琀栀愀琀⸀洀愀砀匀挀爀漀氀氀堀⤀ 笀 ഍
			newX = that.options.bounce ? Math.round(that.x + leftDelta / 3) : (newX >= 0 || that.maxScrollX>=0) ? 0 : that.maxScrollX;ഀ਍ऀऀ紀 ഍
		if (newY >= 0 || newY < that.maxScrollY) { ഀ਍ऀऀऀ渀攀眀夀 㴀 琀栀愀琀⸀漀瀀琀椀漀渀猀⸀戀漀甀渀挀攀 㼀 䴀愀琀栀⸀爀漀甀渀搀⠀琀栀愀琀⸀礀 ⬀ 琀漀瀀䐀攀氀琀愀 ⼀ ㌀⤀ 㨀 ⠀渀攀眀夀 㸀㴀 　 簀簀 琀栀愀琀⸀洀愀砀匀挀爀漀氀氀夀㸀㴀　⤀ 㼀 　 㨀 琀栀愀琀⸀洀愀砀匀挀爀漀氀氀夀㬀 ഍
		}ഀ਍ ഍
		if (that.dist > 5) {			// 5 pixels threshold is needed on Android, but also on iPhone looks more naturalഀ਍ऀऀऀ琀栀愀琀⸀猀攀琀倀漀猀椀琀椀漀渀⠀渀攀眀堀Ⰰ 渀攀眀夀⤀㬀 ഍
			that.moved = true;ഀ਍ऀऀऀ琀栀愀琀⸀搀椀爀攀挀琀椀漀渀堀 㴀 氀攀昀琀䐀攀氀琀愀 㸀 　 㼀 ⴀ㄀ 㨀 ㄀㬀 ഍
			that.directionY = topDelta > 0 ? -1 : 1;ഀ਍ऀऀ紀 攀氀猀攀 笀 ഍
			that.dist+= Math.abs(leftDelta) + Math.abs(topDelta);ഀ਍ऀऀ紀 ഍
	},ഀ਍ऀ ഍
	touchEnd: function(e) {ഀ਍ऀऀ瘀愀爀 琀栀愀琀 㴀 琀栀椀猀Ⰰ ഍
			time = e.timeStamp - that.scrollStartTime,ഀ਍ऀऀऀ瀀漀椀渀琀 㴀 椀猀吀漀甀挀栀 㼀 攀⸀挀栀愀渀最攀搀吀漀甀挀栀攀猀嬀　崀 㨀 攀Ⰰ ഍
			target, ev,ഀ਍ऀऀऀ洀漀洀攀渀琀甀洀堀Ⰰ 洀漀洀攀渀琀甀洀夀Ⰰ ഍
			newDuration = 0,ഀ਍ऀऀऀ渀攀眀倀漀猀椀琀椀漀渀堀 㴀 琀栀愀琀⸀砀Ⰰ 渀攀眀倀漀猀椀琀椀漀渀夀 㴀 琀栀愀琀⸀礀Ⰰ ഍
			snap;ഀ਍ ഍
		if (!that.scrolling) {ഀ਍ऀऀऀ爀攀琀甀爀渀㬀 ഍
		}ഀ਍ऀऀ琀栀愀琀⸀猀挀爀漀氀氀椀渀最 㴀 昀愀氀猀攀㬀 ഍
ഀ਍ऀऀ椀昀 ⠀℀琀栀愀琀⸀洀漀瘀攀搀⤀ 笀 ഍
			that.resetPosition();ഀ਍ ഍
			if (isTouch) {ഀ਍ऀऀऀऀ⼀⼀ 䘀椀渀搀 琀栀攀 氀愀猀琀 琀漀甀挀栀攀搀 攀氀攀洀攀渀琀 ഍
				target = point.target;ഀ਍ऀऀऀऀ眀栀椀氀攀 ⠀琀愀爀最攀琀⸀渀漀搀攀吀礀瀀攀 ℀㴀 ㄀⤀ 笀 ഍
					target = target.parentNode;ഀ਍ऀऀऀऀ紀 ഍
ഀ਍ऀऀऀऀ⼀⼀ 䌀爀攀愀琀攀 琀栀攀 昀愀欀攀 攀瘀攀渀琀 ഍
				target.style.pointerEvents = 'auto';ഀ਍ऀऀऀऀ攀瘀 㴀 搀漀挀甀洀攀渀琀⸀挀爀攀愀琀攀䔀瘀攀渀琀⠀✀䴀漀甀猀攀䔀瘀攀渀琀猀✀⤀㬀 ഍
				ev.initMouseEvent('click', true, true, e.view, 1,ഀ਍ऀऀऀऀऀ瀀漀椀渀琀⸀猀挀爀攀攀渀堀Ⰰ 瀀漀椀渀琀⸀猀挀爀攀攀渀夀Ⰰ 瀀漀椀渀琀⸀挀氀椀攀渀琀堀Ⰰ 瀀漀椀渀琀⸀挀氀椀攀渀琀夀Ⰰ ഍
					e.ctrlKey, e.altKey, e.shiftKey, e.metaKey,ഀ਍ऀऀऀऀऀ　Ⰰ 渀甀氀氀⤀㬀 ഍
				ev._fake = true;ഀ਍ऀऀऀऀ琀愀爀最攀琀⸀搀椀猀瀀愀琀挀栀䔀瘀攀渀琀⠀攀瘀⤀㬀 ഍
			}ഀ਍ ഍
			return;ഀ਍ऀऀ紀 ഍
ഀ਍ऀऀ椀昀 ⠀℀琀栀愀琀⸀漀瀀琀椀漀渀猀⸀猀渀愀瀀 ☀☀ 琀椀洀攀 㸀 ㈀㔀　⤀ 笀ऀऀऀ⼀⼀ 倀爀攀瘀攀渀琀 猀氀椀渀最猀栀漀琀 攀昀昀攀挀琀 ഍
			that.resetPosition();ഀ਍ऀऀऀ爀攀琀甀爀渀㬀 ഍
		}ഀ਍ ഍
		if (that.options.momentum) {ഀ਍ऀऀऀ洀漀洀攀渀琀甀洀堀 㴀 琀栀愀琀⸀猀挀爀漀氀氀堀 㴀㴀㴀 琀爀甀攀 ഍
				? that.momentum(that.x - that.scrollStartX,ഀ਍ऀऀऀऀऀऀऀऀ琀椀洀攀Ⰰ ഍
								that.options.bounce ? -that.x + that.scrollWidth/5 : -that.x,ഀ਍ऀऀऀऀऀऀऀऀ琀栀愀琀⸀漀瀀琀椀漀渀猀⸀戀漀甀渀挀攀 㼀 琀栀愀琀⸀砀 ⬀ 琀栀愀琀⸀猀挀爀漀氀氀攀爀圀椀搀琀栀 ⴀ 琀栀愀琀⸀猀挀爀漀氀氀圀椀搀琀栀 ⬀ 琀栀愀琀⸀猀挀爀漀氀氀圀椀搀琀栀⼀㔀 㨀 琀栀愀琀⸀砀 ⬀ 琀栀愀琀⸀猀挀爀漀氀氀攀爀圀椀搀琀栀 ⴀ 琀栀愀琀⸀猀挀爀漀氀氀圀椀搀琀栀⤀ ഍
				: { dist: 0, time: 0 };ഀ਍ ഍
			momentumY = that.scrollY === trueഀ਍ऀऀऀऀ㼀 琀栀愀琀⸀洀漀洀攀渀琀甀洀⠀琀栀愀琀⸀礀 ⴀ 琀栀愀琀⸀猀挀爀漀氀氀匀琀愀爀琀夀Ⰰ ഍
								time,ഀ਍ऀऀऀऀऀऀऀऀ琀栀愀琀⸀漀瀀琀椀漀渀猀⸀戀漀甀渀挀攀 㼀 ⴀ琀栀愀琀⸀礀 ⬀ 琀栀愀琀⸀猀挀爀漀氀氀䠀攀椀最栀琀⼀㔀 㨀 ⴀ琀栀愀琀⸀礀Ⰰ ഍
								that.options.bounce ? (that.maxScrollY < 0 ? that.y + that.scrollerHeight - that.scrollHeight : 0) + that.scrollHeight/5 : that.y + that.scrollerHeight - that.scrollHeight)ഀ਍ऀऀऀऀ㨀 笀 搀椀猀琀㨀 　Ⰰ 琀椀洀攀㨀 　 紀㬀 ഍
ഀ਍ऀऀऀ渀攀眀䐀甀爀愀琀椀漀渀 㴀 䴀愀琀栀⸀洀愀砀⠀䴀愀琀栀⸀洀愀砀⠀洀漀洀攀渀琀甀洀堀⸀琀椀洀攀Ⰰ 洀漀洀攀渀琀甀洀夀⸀琀椀洀攀⤀Ⰰ ㄀⤀㬀ऀऀ⼀⼀ 吀栀攀 洀椀渀椀洀甀洀 愀渀椀洀愀琀椀漀渀 氀攀渀最琀栀 洀甀猀琀 戀攀 ㄀洀猀 ഍
			newPositionX = that.x + momentumX.dist;ഀ਍ऀऀऀ渀攀眀倀漀猀椀琀椀漀渀夀 㴀 琀栀愀琀⸀礀 ⬀ 洀漀洀攀渀琀甀洀夀⸀搀椀猀琀㬀 ഍
		}ഀ਍ ഍
		if (that.options.snap) {ഀ਍ऀऀऀ猀渀愀瀀 㴀 琀栀愀琀⸀猀渀愀瀀⠀渀攀眀倀漀猀椀琀椀漀渀堀Ⰰ 渀攀眀倀漀猀椀琀椀漀渀夀⤀㬀 ഍
			newPositionX = snap.x;ഀ਍ऀऀऀ渀攀眀倀漀猀椀琀椀漀渀夀 㴀 猀渀愀瀀⸀礀㬀 ഍
			newDuration = Math.max(snap.time, newDuration);ഀ਍ऀऀ紀 ഍
ഀ਍ऀऀ琀栀愀琀⸀猀挀爀漀氀氀吀漀⠀渀攀眀倀漀猀椀琀椀漀渀堀Ⰰ 渀攀眀倀漀猀椀琀椀漀渀夀Ⰰ 渀攀眀䐀甀爀愀琀椀漀渀 ⬀ ✀洀猀✀⤀㬀 ഍
	},ഀ਍ ഍
	transitionEnd: function () {ഀ਍ऀऀ瘀愀爀 琀栀愀琀 㴀 琀栀椀猀㬀 ഍
		document.removeEventListener('webkitTransitionEnd', that, false);ഀ਍ऀऀ琀栀愀琀⸀爀攀猀攀琀倀漀猀椀琀椀漀渀⠀⤀㬀 ഍
	},ഀ਍ ഍
	resetPosition: function () {ഀ਍ऀऀ瘀愀爀 琀栀愀琀 㴀 琀栀椀猀Ⰰ ഍
			resetX = that.x,ഀ਍ऀऀ ऀ爀攀猀攀琀夀 㴀 琀栀愀琀⸀礀㬀 ഍
ഀ਍ऀऀ椀昀 ⠀琀栀愀琀⸀砀 㸀㴀 　⤀ 笀 ഍
			resetX = 0;ഀ਍ऀऀ紀 攀氀猀攀 椀昀 ⠀琀栀愀琀⸀砀 㰀 琀栀愀琀⸀洀愀砀匀挀爀漀氀氀堀⤀ 笀 ഍
			resetX = that.maxScrollX;ഀ਍ऀऀ紀 ഍
ഀ਍ऀऀ椀昀 ⠀琀栀愀琀⸀礀 㸀㴀 　 簀簀 琀栀愀琀⸀洀愀砀匀挀爀漀氀氀夀 㸀 　⤀ 笀 ഍
			resetY = 0;ഀ਍ऀऀ紀 攀氀猀攀 椀昀 ⠀琀栀愀琀⸀礀 㰀 琀栀愀琀⸀洀愀砀匀挀爀漀氀氀夀⤀ 笀 ഍
			resetY = that.maxScrollY;ഀ਍ऀऀ紀 ഍
		ഀ਍ऀऀ椀昀 ⠀爀攀猀攀琀堀 ℀㴀 琀栀愀琀⸀砀 簀簀 爀攀猀攀琀夀 ℀㴀 琀栀愀琀⸀礀⤀ 笀 ഍
			that.scrollTo(resetX, resetY);ഀ਍ऀऀ紀 攀氀猀攀 笀 ഍
			if (that.moved) {ഀ਍ऀऀऀऀ琀栀愀琀⸀漀渀匀挀爀漀氀氀䔀渀搀⠀⤀㬀ऀऀ⼀⼀ 䔀砀攀挀甀琀攀 挀甀猀琀漀洀 挀漀搀攀 漀渀 猀挀爀漀氀氀 攀渀搀 ഍
				that.moved = false;ഀ਍ऀऀऀ紀 ഍
ഀ਍ऀऀऀ⼀⼀ 䠀椀搀攀 琀栀攀 猀挀爀漀氀氀戀愀爀猀 ഍
			if (that.scrollBarX) {ഀ਍ऀऀऀऀ琀栀愀琀⸀猀挀爀漀氀氀䈀愀爀堀⸀栀椀搀攀⠀⤀㬀 ഍
			}ഀ਍ऀऀऀ椀昀 ⠀琀栀愀琀⸀猀挀爀漀氀氀䈀愀爀夀⤀ 笀 ഍
				that.scrollBarY.hide();ഀ਍ऀऀऀ紀 ഍
		}ഀ਍ऀ紀Ⰰ ഍
	ഀ਍ऀ猀渀愀瀀㨀 昀甀渀挀琀椀漀渀 ⠀砀Ⰰ 礀⤀ 笀 ഍
		var that = this, time;ഀ਍ ഍
		if (that.directionX > 0) {ഀ਍ऀऀऀ砀 㴀 䴀愀琀栀⸀昀氀漀漀爀⠀砀⼀琀栀愀琀⸀猀挀爀漀氀氀圀椀搀琀栀⤀㬀 ഍
		} else if (that.directionX < 0) {ഀ਍ऀऀऀ砀 㴀 䴀愀琀栀⸀挀攀椀氀⠀砀⼀琀栀愀琀⸀猀挀爀漀氀氀圀椀搀琀栀⤀㬀 ഍
		} else {ഀ਍ऀऀऀ砀 㴀 䴀愀琀栀⸀爀漀甀渀搀⠀砀⼀琀栀愀琀⸀猀挀爀漀氀氀圀椀搀琀栀⤀㬀 ഍
		}ഀ਍ऀऀ琀栀愀琀⸀瀀愀最攀堀 㴀 ⴀ砀㬀 ഍
		x = x * that.scrollWidth;ഀ਍ऀऀ椀昀 ⠀砀 㸀 　⤀ 笀 ഍
			x = that.pageX = 0;ഀ਍ऀऀ紀 攀氀猀攀 椀昀 ⠀砀 㰀 琀栀愀琀⸀洀愀砀匀挀爀漀氀氀堀⤀ 笀 ഍
			that.pageX = that.maxPageX;ഀ਍ऀऀऀ砀 㴀 琀栀愀琀⸀洀愀砀匀挀爀漀氀氀堀㬀 ഍
		}ഀ਍ ഍
		if (that.directionY > 0) {ഀ਍ऀऀऀ礀 㴀 䴀愀琀栀⸀昀氀漀漀爀⠀礀⼀琀栀愀琀⸀猀挀爀漀氀氀䠀攀椀最栀琀⤀㬀 ഍
		} else if (that.directionY < 0) {ഀ਍ऀऀऀ礀 㴀 䴀愀琀栀⸀挀攀椀氀⠀礀⼀琀栀愀琀⸀猀挀爀漀氀氀䠀攀椀最栀琀⤀㬀 ഍
		} else {ഀ਍ऀऀऀ礀 㴀 䴀愀琀栀⸀爀漀甀渀搀⠀礀⼀琀栀愀琀⸀猀挀爀漀氀氀䠀攀椀最栀琀⤀㬀 ഍
		}ഀ਍ऀऀ琀栀愀琀⸀瀀愀最攀夀 㴀 ⴀ礀㬀 ഍
		y = y * that.scrollHeight;ഀ਍ऀऀ椀昀 ⠀礀 㸀 　⤀ 笀 ഍
			y = that.pageY = 0;ഀ਍ऀऀ紀 攀氀猀攀 椀昀 ⠀礀 㰀 琀栀愀琀⸀洀愀砀匀挀爀漀氀氀夀⤀ 笀 ഍
			that.pageY = that.maxPageY;ഀ਍ऀऀऀ礀 㴀 琀栀愀琀⸀洀愀砀匀挀爀漀氀氀夀㬀 ഍
		}ഀ਍ ഍
		// Snap with constant speed (proportional duration)ഀ਍ऀऀ琀椀洀攀 㴀 䴀愀琀栀⸀爀漀甀渀搀⠀䴀愀琀栀⸀洀愀砀⠀ ഍
				Math.abs(that.x - x) / that.scrollWidth * 500,ഀ਍ऀऀऀऀ䴀愀琀栀⸀愀戀猀⠀琀栀愀琀⸀礀 ⴀ 礀⤀ ⼀ 琀栀愀琀⸀猀挀爀漀氀氀䠀攀椀最栀琀 ⨀ 㔀　　 ഍
			));ഀ਍ऀऀऀ ഍
		return { x: x, y: y, time: time };ഀ਍ऀ紀Ⰰ ഍
ഀ਍ऀ猀挀爀漀氀氀吀漀㨀 昀甀渀挀琀椀漀渀 ⠀搀攀猀琀堀Ⰰ 搀攀猀琀夀Ⰰ 爀甀渀琀椀洀攀⤀ 笀 ഍
		var that = this;ഀ਍ ഍
		if (that.x == destX && that.y == destY) {ഀ਍ऀऀऀ琀栀愀琀⸀爀攀猀攀琀倀漀猀椀琀椀漀渀⠀⤀㬀 ഍
			return;ഀ਍ऀऀ紀 ഍
ഀ਍ऀऀ琀栀愀琀⸀洀漀瘀攀搀 㴀 琀爀甀攀㬀 ഍
		that.setTransitionTime(runtime || '350ms');ഀ਍ऀऀ琀栀愀琀⸀猀攀琀倀漀猀椀琀椀漀渀⠀搀攀猀琀堀Ⰰ 搀攀猀琀夀⤀㬀 ഍
ഀ਍ऀऀ椀昀 ⠀爀甀渀琀椀洀攀㴀㴀㴀✀　✀ 簀簀 爀甀渀琀椀洀攀㴀㴀✀　猀✀ 簀簀 爀甀渀琀椀洀攀㴀㴀✀　洀猀✀⤀ 笀 ഍
			that.resetPosition();ഀ਍ऀऀ紀 攀氀猀攀 笀 ഍
			document.addEventListener('webkitTransitionEnd', that, false);	// At the end of the transition check if we are still inside of the boundariesഀ਍ऀऀ紀 ഍
	},ഀ਍ऀ ഍
	scrollToPage: function (pageX, pageY, runtime) {ഀ਍ऀऀ瘀愀爀 琀栀愀琀 㴀 琀栀椀猀Ⰰ 猀渀愀瀀㬀 ഍
ഀ਍ऀऀ椀昀 ⠀℀琀栀愀琀⸀漀瀀琀椀漀渀猀⸀猀渀愀瀀⤀ 笀 ഍
			that.pageX = -Math.round(that.x / that.scrollWidth);ഀ਍ऀऀऀ琀栀愀琀⸀瀀愀最攀夀 㴀 ⴀ䴀愀琀栀⸀爀漀甀渀搀⠀琀栀愀琀⸀礀 ⼀ 琀栀愀琀⸀猀挀爀漀氀氀䠀攀椀最栀琀⤀㬀 ഍
		}ഀ਍ ഍
		if (pageX == 'next') {ഀ਍ऀऀऀ瀀愀最攀堀 㴀 ⬀⬀琀栀愀琀⸀瀀愀最攀堀㬀 ഍
		} else if (pageX == 'prev') {ഀ਍ऀऀऀ瀀愀最攀堀 㴀 ⴀⴀ琀栀愀琀⸀瀀愀最攀堀㬀 ഍
		}ഀ਍ ഍
		if (pageY == 'next') {ഀ਍ऀऀऀ瀀愀最攀夀 㴀 ⬀⬀琀栀愀琀⸀瀀愀最攀夀㬀 ഍
		} else if (pageY == 'prev') {ഀ਍ऀऀऀ瀀愀最攀夀 㴀 ⴀⴀ琀栀愀琀⸀瀀愀最攀夀㬀 ഍
		}ഀ਍ ഍
		pageX = -pageX*that.scrollWidth;ഀ਍ऀऀ瀀愀最攀夀 㴀 ⴀ瀀愀最攀夀⨀琀栀愀琀⸀猀挀爀漀氀氀䠀攀椀最栀琀㬀 ഍
ഀ਍ऀऀ猀渀愀瀀 㴀 琀栀愀琀⸀猀渀愀瀀⠀瀀愀最攀堀Ⰰ 瀀愀最攀夀⤀㬀 ഍
		pageX = snap.x;ഀ਍ऀऀ瀀愀最攀夀 㴀 猀渀愀瀀⸀礀㬀 ഍
ഀ਍ऀऀ琀栀愀琀⸀猀挀爀漀氀氀吀漀⠀瀀愀最攀堀Ⰰ 瀀愀最攀夀Ⰰ 爀甀渀琀椀洀攀 簀簀 ✀㔀　　洀猀✀⤀㬀 ഍
	},ഀ਍ ഍
	scrollToElement: function (el, runtime) {ഀ਍ऀऀ攀氀 㴀 琀礀瀀攀漀昀 攀氀 㴀㴀 ✀漀戀樀攀挀琀✀ 㼀 攀氀 㨀 琀栀椀猀⸀攀氀攀洀攀渀琀⸀焀甀攀爀礀匀攀氀攀挀琀漀爀⠀攀氀⤀㬀 ഍
ഀ਍ऀऀ椀昀 ⠀℀攀氀⤀ 笀 ഍
			return;ഀ਍ऀऀ紀 ഍
ഀ਍ऀऀ瘀愀爀 琀栀愀琀 㴀 琀栀椀猀Ⰰ ഍
			x = that.scrollX ? -el.offsetLeft : 0,ഀ਍ऀऀऀ礀 㴀 琀栀愀琀⸀猀挀爀漀氀氀夀 㼀 ⴀ攀氀⸀漀昀昀猀攀琀吀漀瀀 㨀 　㬀 ഍
ഀ਍ऀऀ椀昀 ⠀砀 㸀㴀 　⤀ 笀 ഍
			x = 0;ഀ਍ऀऀ紀 攀氀猀攀 椀昀 ⠀砀 㰀 琀栀愀琀⸀洀愀砀匀挀爀漀氀氀堀⤀ 笀 ഍
			x = that.maxScrollX;ഀ਍ऀऀ紀 ഍
ഀ਍ऀऀ椀昀 ⠀礀 㸀㴀 　⤀ 笀 ഍
			y = 0;ഀ਍ऀऀ紀 攀氀猀攀 椀昀 ⠀礀 㰀 琀栀愀琀⸀洀愀砀匀挀爀漀氀氀夀⤀ 笀 ഍
			y = that.maxScrollY;ഀ਍ऀऀ紀 ഍
ഀ਍ऀऀ琀栀愀琀⸀猀挀爀漀氀氀吀漀⠀砀Ⰰ 礀Ⰰ 爀甀渀琀椀洀攀⤀㬀 ഍
	},ഀ਍ ഍
	momentum: function (dist, time, maxDistUpper, maxDistLower) {ഀ਍ऀऀ瘀愀爀 昀爀椀挀琀椀漀渀 㴀 ㈀⸀㔀Ⰰ ഍
			deceleration = 1.2,ഀ਍ऀऀऀ猀瀀攀攀搀 㴀 䴀愀琀栀⸀愀戀猀⠀搀椀猀琀⤀ ⼀ 琀椀洀攀 ⨀ ㄀　　　Ⰰ ഍
			newDist = speed * speed / friction / 1000,ഀ਍ऀऀऀ渀攀眀吀椀洀攀 㴀 　㬀 ഍
ഀ਍ऀऀ⼀⼀ 倀爀漀瀀漀爀琀椀渀愀氀氀礀 爀攀搀甀挀攀 猀瀀攀攀搀 椀昀 眀攀 愀爀攀 漀甀琀猀椀搀攀 漀昀 琀栀攀 戀漀甀渀搀愀爀椀攀猀  ഍
		if (dist > 0 && newDist > maxDistUpper) {ഀ਍ऀऀऀ猀瀀攀攀搀 㴀 猀瀀攀攀搀 ⨀ 洀愀砀䐀椀猀琀唀瀀瀀攀爀 ⼀ 渀攀眀䐀椀猀琀 ⼀ 昀爀椀挀琀椀漀渀㬀 ഍
			newDist = maxDistUpper;ഀ਍ऀऀ紀 攀氀猀攀 椀昀 ⠀搀椀猀琀 㰀 　 ☀☀ 渀攀眀䐀椀猀琀 㸀 洀愀砀䐀椀猀琀䰀漀眀攀爀⤀ 笀 ഍
			speed = speed * maxDistLower / newDist / friction;ഀ਍ऀऀऀ渀攀眀䐀椀猀琀 㴀 洀愀砀䐀椀猀琀䰀漀眀攀爀㬀 ഍
		}ഀ਍ऀऀ ഍
		newDist = newDist * (dist < 0 ? -1 : 1);ഀ਍ऀऀ渀攀眀吀椀洀攀 㴀 猀瀀攀攀搀 ⼀ 搀攀挀攀氀攀爀愀琀椀漀渀㬀 ഍
ഀ਍ऀऀ爀攀琀甀爀渀 笀 搀椀猀琀㨀 䴀愀琀栀⸀爀漀甀渀搀⠀渀攀眀䐀椀猀琀⤀Ⰰ 琀椀洀攀㨀 䴀愀琀栀⸀爀漀甀渀搀⠀渀攀眀吀椀洀攀⤀ 紀㬀 ഍
	},ഀ਍ऀ ഍
	onScrollEnd: function () {},ഀ਍ऀ ഍
	destroy: function (full) {ഀ਍ऀऀ瘀愀爀 琀栀愀琀 㴀 琀栀椀猀㬀 ഍
ഀ਍ऀऀ眀椀渀搀漀眀⸀爀攀洀漀瘀攀䔀瘀攀渀琀䰀椀猀琀攀渀攀爀⠀✀漀渀漀爀椀攀渀琀愀琀椀漀渀挀栀愀渀最攀✀ 椀渀 眀椀渀搀漀眀 㼀 ✀漀爀椀攀渀琀愀琀椀漀渀挀栀愀渀最攀✀ 㨀 ✀爀攀猀椀稀攀✀Ⰰ 琀栀愀琀Ⰰ 昀愀氀猀攀⤀㬀ऀऀ ഍
		that.element.removeEventListener(START_EVENT, that, false);ഀ਍ऀऀ琀栀愀琀⸀攀氀攀洀攀渀琀⸀爀攀洀漀瘀攀䔀瘀攀渀琀䰀椀猀琀攀渀攀爀⠀䴀伀嘀䔀开䔀嘀䔀一吀Ⰰ 琀栀愀琀Ⰰ 昀愀氀猀攀⤀㬀 ഍
		that.element.removeEventListener(END_EVENT, that, false);ഀ਍ऀऀ搀漀挀甀洀攀渀琀⸀爀攀洀漀瘀攀䔀瘀攀渀琀䰀椀猀琀攀渀攀爀⠀✀眀攀戀欀椀琀吀爀愀渀猀椀琀椀漀渀䔀渀搀✀Ⰰ 琀栀愀琀Ⰰ 昀愀氀猀攀⤀㬀 ഍
ഀ਍ऀऀ椀昀 ⠀琀栀愀琀⸀漀瀀琀椀漀渀猀⸀挀栀攀挀欀䐀伀䴀䌀栀愀渀最攀猀⤀ 笀 ഍
			that.element.removeEventListener('DOMSubtreeModified', that, false);ഀ਍ऀऀ紀 ഍
ഀ਍ऀऀ椀昀 ⠀琀栀愀琀⸀猀挀爀漀氀氀䈀愀爀堀⤀ 笀 ഍
			that.scrollBarX = that.scrollBarX.remove();ഀ਍ऀऀ紀 ഍
ഀ਍ऀऀ椀昀 ⠀琀栀愀琀⸀猀挀爀漀氀氀䈀愀爀夀⤀ 笀 ഍
			that.scrollBarY = that.scrollBarY.remove();ഀ਍ऀऀ紀 ഍
		ഀ਍ऀऀ椀昀 ⠀昀甀氀氀⤀ 笀 ഍
			that.wrapper.parentNode.removeChild(that.wrapper);ഀ਍ऀऀ紀 ഍
		ഀ਍ऀऀ爀攀琀甀爀渀 渀甀氀氀㬀 ഍
	}ഀ਍紀㬀 ഍
ഀ਍昀甀渀挀琀椀漀渀 猀挀爀漀氀氀戀愀爀 ⠀搀椀爀Ⰰ 眀爀愀瀀瀀攀爀Ⰰ 昀愀搀攀Ⰰ 猀栀爀椀渀欀⤀ 笀 ഍
	var that = this, style;ഀ਍ऀ ഍
	that.dir = dir;ഀ਍ऀ琀栀愀琀⸀昀愀搀攀 㴀 昀愀搀攀㬀 ഍
	that.shrink = shrink;ഀ਍ऀ琀栀愀琀⸀甀椀搀 㴀 ⬀⬀甀椀搀㬀 ഍
ഀ਍ऀ⼀⼀ 䌀爀攀愀琀攀 洀愀椀渀 猀挀爀漀氀氀戀愀爀 ഍
	that.bar = document.createElement('div');ഀ਍ ഍
	style = 'position:absolute;top:0;left:0;-webkit-transition-timing-function:cubic-bezier(0,0,0.25,1);pointer-events:none;-webkit-transition-duration:0;-webkit-transition-delay:0;-webkit-transition-property:-webkit-transform;z-index:10;background:rgba(0,0,0,0.5);' +ഀ਍ऀऀ✀ⴀ眀攀戀欀椀琀ⴀ琀爀愀渀猀昀漀爀洀㨀✀ ⬀ 琀爀愀渀猀氀愀琀攀伀瀀攀渀 ⬀ ✀　Ⰰ　✀ ⬀ 琀爀愀渀猀氀愀琀攀䌀氀漀猀攀 ⬀ ✀㬀✀ ⬀ ഍
		(dir == 'horizontal' ? '-webkit-border-radius:3px 2px;min-width:6px;min-height:5px' : '-webkit-border-radius:2px 3px;min-width:5px;min-height:6px');ഀ਍ ഍
	that.bar.setAttribute('style', style);ഀ਍ ഍
	// Create scrollbar wrapperഀ਍ऀ琀栀愀琀⸀眀爀愀瀀瀀攀爀 㴀 搀漀挀甀洀攀渀琀⸀挀爀攀愀琀攀䔀氀攀洀攀渀琀⠀✀搀椀瘀✀⤀㬀 ഍
	style = '-webkit-mask:-webkit-canvas(scrollbar' + that.uid + that.dir + ');position:absolute;z-index:10;pointer-events:none;overflow:hidden;opacity:0;-webkit-transition-duration:' + (fade ? '300ms' : '0') + ';-webkit-transition-delay:0;-webkit-transition-property:opacity;' +ഀ਍ऀऀ⠀琀栀愀琀⸀搀椀爀 㴀㴀 ✀栀漀爀椀稀漀渀琀愀氀✀ 㼀 ✀戀漀琀琀漀洀㨀㈀瀀砀㬀氀攀昀琀㨀㈀瀀砀㬀爀椀最栀琀㨀㜀瀀砀㬀栀攀椀最栀琀㨀㔀瀀砀✀ 㨀 ✀琀漀瀀㨀㈀瀀砀㬀爀椀最栀琀㨀㈀瀀砀㬀戀漀琀琀漀洀㨀㜀瀀砀㬀眀椀搀琀栀㨀㔀瀀砀㬀✀⤀㬀 ഍
	that.wrapper.setAttribute('style', style);ഀ਍ ഍
	// Add scrollbar to the DOMഀ਍ऀ琀栀愀琀⸀眀爀愀瀀瀀攀爀⸀愀瀀瀀攀渀搀䌀栀椀氀搀⠀琀栀愀琀⸀戀愀爀⤀㬀 ഍
	wrapper.appendChild(that.wrapper);ഀ਍紀 ഍
ഀ਍猀挀爀漀氀氀戀愀爀⸀瀀爀漀琀漀琀礀瀀攀 㴀 笀 ഍
	init: function (scroll, size) {ഀ਍ऀऀ瘀愀爀 琀栀愀琀 㴀 琀栀椀猀Ⰰ ഍
			ctx;ഀ਍ ഍
		// Create scrollbar maskഀ਍ऀऀ椀昀 ⠀琀栀愀琀⸀搀椀爀 㴀㴀 ✀栀漀爀椀稀漀渀琀愀氀✀⤀ 笀 ഍
			if (that.maxSize != that.wrapper.offsetWidth) {ഀ਍ऀऀऀऀ琀栀愀琀⸀洀愀砀匀椀稀攀 㴀 琀栀愀琀⸀眀爀愀瀀瀀攀爀⸀漀昀昀猀攀琀圀椀搀琀栀㬀 ഍
				ctx = document.getCSSCanvasContext("2d", "scrollbar" + that.uid + that.dir, that.maxSize, 5);ഀ਍ऀऀऀऀ挀琀砀⸀昀椀氀氀匀琀礀氀攀 㴀 ∀爀最戀⠀　Ⰰ　Ⰰ　⤀∀㬀 ഍
				ctx.beginPath();ഀ਍ऀऀऀऀ挀琀砀⸀愀爀挀⠀㈀⸀㔀Ⰰ ㈀⸀㔀Ⰰ ㈀⸀㔀Ⰰ 䴀愀琀栀⸀倀䤀⼀㈀Ⰰ ⴀ䴀愀琀栀⸀倀䤀⼀㈀Ⰰ 昀愀氀猀攀⤀㬀 ഍
				ctx.lineTo(that.maxSize-2.5, 0);ഀ਍ऀऀऀऀ挀琀砀⸀愀爀挀⠀琀栀愀琀⸀洀愀砀匀椀稀攀ⴀ㈀⸀㔀Ⰰ ㈀⸀㔀Ⰰ ㈀⸀㔀Ⰰ ⴀ䴀愀琀栀⸀倀䤀⼀㈀Ⰰ 䴀愀琀栀⸀倀䤀⼀㈀Ⰰ 昀愀氀猀攀⤀㬀 ഍
				ctx.closePath();ഀ਍ऀऀऀऀ挀琀砀⸀昀椀氀氀⠀⤀㬀 ഍
			}ഀ਍ऀऀ紀 攀氀猀攀 笀 ഍
			if (that.maxSize != that.wrapper.offsetHeight) {ഀ਍ऀऀऀऀ琀栀愀琀⸀洀愀砀匀椀稀攀 㴀 琀栀愀琀⸀眀爀愀瀀瀀攀爀⸀漀昀昀猀攀琀䠀攀椀最栀琀㬀 ഍
				ctx = document.getCSSCanvasContext("2d", "scrollbar" + that.uid + that.dir, 5, that.maxSize);ഀ਍ऀऀऀऀ挀琀砀⸀昀椀氀氀匀琀礀氀攀 㴀 ∀爀最戀⠀　Ⰰ　Ⰰ　⤀∀㬀 ഍
				ctx.beginPath();ഀ਍ऀऀऀऀ挀琀砀⸀愀爀挀⠀㈀⸀㔀Ⰰ ㈀⸀㔀Ⰰ ㈀⸀㔀Ⰰ 䴀愀琀栀⸀倀䤀Ⰰ 　Ⰰ 昀愀氀猀攀⤀㬀 ഍
				ctx.lineTo(5, that.maxSize-2.5);ഀ਍ऀऀऀऀ挀琀砀⸀愀爀挀⠀㈀⸀㔀Ⰰ 琀栀愀琀⸀洀愀砀匀椀稀攀ⴀ㈀⸀㔀Ⰰ ㈀⸀㔀Ⰰ 　Ⰰ 䴀愀琀栀⸀倀䤀Ⰰ 昀愀氀猀攀⤀㬀 ഍
				ctx.closePath();ഀ਍ऀऀऀऀ挀琀砀⸀昀椀氀氀⠀⤀㬀 ഍
			}ഀ਍ऀऀ紀 ഍
ഀ਍ऀऀ琀栀愀琀⸀猀椀稀攀 㴀 䴀愀琀栀⸀洀愀砀⠀䴀愀琀栀⸀爀漀甀渀搀⠀琀栀愀琀⸀洀愀砀匀椀稀攀 ⨀ 琀栀愀琀⸀洀愀砀匀椀稀攀 ⼀ 猀椀稀攀⤀Ⰰ 㘀⤀㬀 ഍
		that.maxScroll = that.maxSize - that.size;ഀ਍ऀऀ琀栀愀琀⸀琀漀圀爀愀瀀瀀攀爀倀爀漀瀀 㴀 琀栀愀琀⸀洀愀砀匀挀爀漀氀氀 ⼀ ⠀猀挀爀漀氀氀 ⴀ 猀椀稀攀⤀㬀 ഍
		that.bar.style[that.dir == 'horizontal' ? 'width' : 'height'] = that.size + 'px';ഀ਍ऀ紀Ⰰ ഍
	ഀ਍ऀ猀攀琀倀漀猀椀琀椀漀渀㨀 昀甀渀挀琀椀漀渀 ⠀瀀漀猀⤀ 笀 ഍
		var that = this;ഀ਍ऀऀ ഍
		if (that.wrapper.style.opacity != '1') {ഀ਍ऀऀऀ琀栀愀琀⸀猀栀漀眀⠀⤀㬀 ഍
		}ഀ਍ ഍
		pos = Math.round(that.toWrapperProp * pos);ഀ਍ ഍
		if (pos < 0) {ഀ਍ऀऀऀ瀀漀猀 㴀 琀栀愀琀⸀猀栀爀椀渀欀 㼀 瀀漀猀 ⬀ 瀀漀猀⨀㌀ 㨀 　㬀 ഍
			if (that.size + pos < 7) {ഀ਍ऀऀऀऀ瀀漀猀 㴀 ⴀ琀栀愀琀⸀猀椀稀攀 ⬀ 㘀㬀 ഍
			}ഀ਍ऀऀ紀 攀氀猀攀 椀昀 ⠀瀀漀猀 㸀 琀栀愀琀⸀洀愀砀匀挀爀漀氀氀⤀ 笀 ഍
			pos = that.shrink ? pos + (pos-that.maxScroll)*3 : that.maxScroll;ഀ਍ऀऀऀ椀昀 ⠀琀栀愀琀⸀猀椀稀攀 ⬀ 琀栀愀琀⸀洀愀砀匀挀爀漀氀氀 ⴀ 瀀漀猀 㰀 㜀⤀ 笀 ഍
				pos = that.size + that.maxScroll - 6;ഀ਍ऀऀऀ紀 ഍
		}ഀ਍ ഍
		pos = that.dir == 'horizontal'ഀ਍ऀऀऀ㼀 琀爀愀渀猀氀愀琀攀伀瀀攀渀 ⬀ 瀀漀猀 ⬀ ✀瀀砀Ⰰ　✀ ⬀ 琀爀愀渀猀氀愀琀攀䌀氀漀猀攀 ഍
			: translateOpen + '0,' + pos + 'px' + translateClose;ഀ਍ ഍
		that.bar.style.webkitTransform = pos;ഀ਍ऀ紀Ⰰ ഍
ഀ਍ऀ猀栀漀眀㨀 昀甀渀挀琀椀漀渀 ⠀⤀ 笀 ഍
		if (has3d) {ഀ਍ऀऀऀ琀栀椀猀⸀眀爀愀瀀瀀攀爀⸀猀琀礀氀攀⸀眀攀戀欀椀琀吀爀愀渀猀椀琀椀漀渀䐀攀氀愀礀 㴀 ✀　✀㬀 ഍
		}ഀ਍ऀऀ琀栀椀猀⸀眀爀愀瀀瀀攀爀⸀猀琀礀氀攀⸀漀瀀愀挀椀琀礀 㴀 ✀㄀✀㬀 ഍
	},ഀ਍ ഍
	hide: function () {ഀ਍ऀऀ椀昀 ⠀栀愀猀㌀搀⤀ 笀 ഍
			this.wrapper.style.webkitTransitionDelay = '350ms';ഀ਍ऀऀ紀 ഍
		this.wrapper.style.opacity = '0';ഀ਍ऀ紀Ⰰ ഍
	ഀ਍ऀ爀攀洀漀瘀攀㨀 昀甀渀挀琀椀漀渀 ⠀⤀ 笀 ഍
		this.wrapper.parentNode.removeChild(this.wrapper);ഀ਍ऀऀ爀攀琀甀爀渀 渀甀氀氀㬀 ഍
	}ഀ਍紀㬀 ഍
ഀ਍⼀⼀ 䤀猀 琀爀愀渀猀氀愀琀攀㌀搀 挀漀洀瀀愀琀椀戀氀攀㼀 ഍
var has3d = ('WebKitCSSMatrix' in window && 'm11' in new WebKitCSSMatrix()),ഀ਍ऀ⼀⼀ 䐀攀瘀椀挀攀 猀渀椀昀昀椀渀最 ഍
	isIphone = (/iphone/gi).test(navigator.appVersion),ഀ਍ऀ椀猀䤀瀀愀搀 㴀 ⠀⼀椀瀀愀搀⼀最椀⤀⸀琀攀猀琀⠀渀愀瘀椀最愀琀漀爀⸀愀瀀瀀嘀攀爀猀椀漀渀⤀Ⰰ ഍
	isAndroid = (/android/gi).test(navigator.appVersion),ഀ਍ऀ椀猀吀漀甀挀栀 㴀 椀猀䤀瀀栀漀渀攀 簀簀 椀猀䤀瀀愀搀 簀簀 椀猀䄀渀搀爀漀椀搀Ⰰ ഍
	// Event sniffingഀ਍ऀ匀吀䄀刀吀开䔀嘀䔀一吀 㴀 椀猀吀漀甀挀栀 㼀 ✀琀漀甀挀栀猀琀愀爀琀✀ 㨀 ✀洀漀甀猀攀搀漀眀渀✀Ⰰ ഍
	MOVE_EVENT = isTouch ? 'touchmove' : 'mousemove',ഀ਍ऀ䔀一䐀开䔀嘀䔀一吀 㴀 椀猀吀漀甀挀栀 㼀 ✀琀漀甀挀栀攀渀搀✀ 㨀 ✀洀漀甀猀攀甀瀀✀Ⰰ ഍
	// Translate3d helperഀ਍ऀ琀爀愀渀猀氀愀琀攀伀瀀攀渀 㴀 ✀琀爀愀渀猀氀愀琀攀✀ ⬀ ⠀栀愀猀㌀搀 㼀 ✀㌀搀⠀✀ 㨀 ✀⠀✀⤀Ⰰ ഍
	translateClose = has3d ? ',0)' : ')',ഀ਍ऀ⼀⼀ 唀渀椀焀甀攀 䤀䐀 ഍
	uid = 0;ഀ਍ ഍
// Expose iScroll to the worldഀ਍眀椀渀搀漀眀⸀椀匀挀爀漀氀氀 㴀 椀匀挀爀漀氀氀㬀 ഍
})();