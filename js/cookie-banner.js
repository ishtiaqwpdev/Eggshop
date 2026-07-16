(function ($) {
  'use strict';

  var CONSENT_KEY = 'et_cookie_consent';
  var COOKIE_ICON = 'https://eggstime.com/wp-content/uploads/2026/06/cookie.png';
  var COOKIE_TITLE = 'Cookies & Privacy';
  var COOKIE_MESSAGE = 'We use cookies to improve your experience and remember preferences.';

  function readCookie(name) {
    var match = document.cookie.match(new RegExp('(?:^|; )' + name.replace(/[.*+?^${}()|[\]\\]/g, '\\$&') + '=([^;]*)'));
    return match ? decodeURIComponent(match[1]) : '';
  }

  function hasConsent() {
    try {
      if (localStorage.getItem(CONSENT_KEY)) {
        return true;
      }
    } catch (error) {
      /* localStorage unavailable */
    }

    if (readCookie('CookieLawInfoConsent')) {
      return true;
    }

    return !!(window.Cookies && Cookies.get && Cookies.get().CookieLawInfoConsent);
  }

  function storeConsent(choice) {
    try {
      localStorage.setItem(CONSENT_KEY, choice || 'accepted');
    } catch (error) {
      /* localStorage unavailable */
    }

    document.documentElement.classList.add('et-cookie-consent-given');
  }

  function unlockSite() {
    $('.wrapper').css('pointer-events', '');
    $('html').css('overflow', '');
  }

  function hideBar() {
    var $bar = $('#cookie-law-info-bar');
    if ($bar.length) {
      $bar.stop(true, true).fadeOut(200, function () {
        $bar.css('display', 'none');
      });
    }
    unlockSite();
  }

  function dismissWithConsent(choice) {
    storeConsent(choice);
    hideBar();
  }

  function acceptEssentialOnly() {
    if (window.CLI && typeof CLI.reject === 'function') {
      CLI.reject();
      dismissWithConsent('essential');
      return;
    }

    if (window.CLI && typeof CLI.close === 'function') {
      CLI.close();
      dismissWithConsent('essential');
      return;
    }

    dismissWithConsent('essential');
  }

  function enhanceCookieBar() {
    var $bar = $('#cookie-law-info-bar');
    if (!$bar.length || $bar.hasClass('et-cookie-bar--ready')) {
      return;
    }

    if (hasConsent()) {
      document.documentElement.classList.add('et-cookie-consent-given');
      $bar.hide();
      unlockSite();
      return;
    }

    var $container = $bar.find('.cli-bar-container').first();
    var $message = $bar.find('.cli-bar-message').first();
    var $buttons = $bar.find('.cli-bar-btn_container').first();
    var $settings = $bar.find('.cli_settings_button').first();
    var $accept = $bar.find('#wt-cli-accept-all-btn').first();

    if (!$container.length || !$message.length || !$buttons.length) {
      return;
    }

    $bar.addClass('et-cookie-bar--ready');
    $bar.find('> span').addClass('et-cookie-bar__shell');

    if (!$bar.find('.et-cookie-bar__close').length) {
      $('<button type="button" class="et-cookie-bar__close" aria-label="Close cookie notice">&times;</button>')
        .appendTo($container)
        .on('click', function (event) {
          event.preventDefault();
          acceptEssentialOnly();
        });
    }

    if (!$bar.find('.et-cookie-bar__header').length) {
      var $header = $('<div class="et-cookie-bar__header"></div>').prependTo($container);

      if (!$bar.find('.et-cookie-bar__visual').length) {
        $('<div class="et-cookie-bar__visual"><img src="' + COOKIE_ICON + '" alt="" width="32" height="32" decoding="async" /></div>')
          .appendTo($header);
      } else {
        $bar.find('.et-cookie-bar__visual').appendTo($header);
      }

      if (!$bar.find('.et-cookie-bar__content').length) {
        $('<div class="et-cookie-bar__content"></div>').appendTo($header);
      }

      $bar.find('.et-cookie-bar__title, .cli-bar-message').appendTo($header.find('.et-cookie-bar__content'));
    }

    if (!$bar.find('.et-cookie-bar__title').length) {
      $('<h3 class="et-cookie-bar__title"></h3>').text(COOKIE_TITLE).prependTo($bar.find('.et-cookie-bar__content'));
    } else {
      $bar.find('.et-cookie-bar__title').text(COOKIE_TITLE);
    }

    $message.text(COOKIE_MESSAGE);

    if (!$bar.find('#et-cli-essential-btn').length) {
      $('<a href="#" role="button" id="et-cli-essential-btn" class="medium cli-plugin-button et-cookie-bar__btn et-cookie-bar__btn--essential">Essential Only</a>')
        .prependTo($buttons)
        .on('click', function (event) {
          event.preventDefault();
          acceptEssentialOnly();
        });
    }

    if ($settings.length) {
      $settings.text('Preferences');
    }

    if ($accept.length) {
      $accept.text('Accept');
    }

    unlockSite();
  }

  window.etCookieBannerHasConsent = hasConsent;
  window.etCookieBannerStoreConsent = storeConsent;

  $(document).on('click', '#wt-cli-accept-all-btn, #wt-cli-privacy-save-btn', function () {
    window.setTimeout(function () {
      dismissWithConsent('accepted');
    }, 120);
  });

  $(document).on('click', '#et-cli-essential-btn', function () {
    window.setTimeout(function () {
      dismissWithConsent('essential');
    }, 120);
  });

  $(function () {
    if (hasConsent()) {
      document.documentElement.classList.add('et-cookie-consent-given');
      $('#cookie-law-info-bar').hide();
      unlockSite();
    }

    enhanceCookieBar();

    var attempts = 0;
    var poll = window.setInterval(function () {
      enhanceCookieBar();
      attempts += 1;
      if ($('#cookie-law-info-bar.et-cookie-bar--ready').length || hasConsent() || attempts > 40) {
        window.clearInterval(poll);
      }
    }, 250);
  });
})(jQuery);
