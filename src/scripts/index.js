export default (function(window){
  var lastEvent = false;

  /**
   * extract mouse pointer position from an event
   * @param  {[type]} event [description]
   * @return {[type]}       [description]
   */
  function getPointer (event) {
    if (event.touches && event.touches.length) {
      return {
        x: event.touches[0].pageX,
        y: event.touches[0].pageY,
        t: event.timeStamp
      };
    } else {
      return {
        x: event.pageX,
        y: event.pageY,
        t: event.timeStamp
      }
    }
  }


  /**
   * detect click
   * @param  {[type]}  event [description]
   * @return {Boolean}       [description]
   */
  function isClickEvent (event) {
    var currentEvent = getPointer(event);
    var dx = Math.abs(currentEvent.x - lastEvent.x);
    var dy = Math.abs(currentEvent.y - lastEvent.y);
    var dt = Math.abs(currentEvent.t - lastEvent.t);

    return dx < 5 && dy < 5 && dt < 500;
  }


  var Site = {

    browser: window.navigator.userAgent,
    pixelRatio: window.devicePixelRatio,

    findSize: function (sizes, width, square, allowSmaller) {
      return sizes.reduce(function (prev, current) {
        if (!square && current.width === current.height) return prev;
        if (!allowSmaller && current.width < width) return prev;

        if (!prev || (Math.abs(width - current.width) < Math.abs(width - prev.width))) {
          return current;
        }

        return prev;
      }, null);
    },

    getImage: function (width, sizes, square) {
      if (!sizes) return;

      var image = this.findSize(sizes, width, square, false);
      if (!image) {
        image = this.findSize(sizes, width, square, true);
      }
      return image ? image : sizes[0];
    },

    /**
     * load background image
     * @param  {[type]} imageContainer [description]
     * @return {[type]}                [description]
     */
    loadBackgroundImage: function (imageContainer, square) {
      var width = imageContainer.offsetWidth * Site.pixelRatio;
      var img = new Image();
      var data = JSON.parse(imageContainer.getAttribute('data-src'));

      img.onload = function () {
        imageContainer.classList.add('ready');
        imageContainer.classList.remove('loading');
        imageContainer.style['background-image'] = 'url('+ img.src +')';
      };

      img.onerror = function () {
        imageContainer.classList.add('ready');
        imageContainer.classList.add('has-error');
        imageContainer.classList.remove('loading');
      };

      var imageObject = Site.getImage(width, data, square);
      imageContainer.classList.remove('ready');
      imageContainer.classList.add('loading');

      img.src = imageObject ? imageObject.url : '';
    },

    loadAllImages: function() {
        var images = document.getElementsByClassName('js-image');
        var backgroundImages = document.getElementsByClassName('js-background-image');

        Array.prototype.map.call(images, function(imageElement) {
            var isSquare = imageElement.getAttribute('data-square') || false;
            Site.loadImage(imageElement, isSquare);
        });

        Array.prototype.map.call(backgroundImages, function(imageElement) {
            var isSquare = imageElement.getAttribute('data-square') || false;
            Site.loadBackgroundImage(imageElement, isSquare);
        });
    },

    /**
     * load image into an element
     * @param  {[type]} imageContainer [description]
     * @return {[type]}                [description]
     */
    loadImage: function (imageContainer, square) {
      var width = imageContainer.offsetWidth * Site.pixelRatio;
      var img = imageContainer.querySelector('img');

      var data = JSON.parse(img.getAttribute('data-src'));

      if (!data) {
        imageContainer.classList.remove('loading');
        imageContainer.classList.add('ready');
        imageContainer.classList.add('has-error');
        return;
      }

      img.onload = function () {
        setTimeout(function() {
          imageContainer.classList.add('ready');
          imageContainer.classList.remove('loading');
        }, 100);
      };

      img.onerror = function () {
        imageContainer.classList.add('ready');
        imageContainer.classList.add('has-error');
        imageContainer.classList.remove('loading');
      };

      var imageObject = Site.getImage(width, data, square);
      imageContainer.classList.remove('ready');
      imageContainer.classList.add('loading');

      img.src = imageObject ? imageObject.url : '';
    },

    /**
     * main menu things
     * @type {Object}
     */
    menuState: {
      rootElement: false,
      itemContainer: false,
      open: false
    },

    openMenu: function () {
      var items = Site.menuState.itemContainer.children;
      var height = 0;
      var itemDelay = 0;
      var itemBetweenDelay = 50;

      for (var i = 0; i < items.length; i++) {
        var delay = itemDelay + (i * itemBetweenDelay);

        items[i].style['transition-delay'] = delay + 'ms';
        items[i].style['-webkit-transition-delay'] = delay + 'ms';
        items[i].style['-moz-transition-delay'] = delay + 'ms';
        items[i].style['-o-transition-delay'] = delay + 'ms';
        items[i].style['-ms-transition-delay'] = delay + 'ms';
        height += items[i].getBoundingClientRect().height;
      }

      Site.menuState.itemContainer.style.height = height + 'px';
      Site.menuState.rootElement.classList.add('menu-open');
      Site.menuState.rootElement.classList.remove('menu-closed');
      Site.menuState.open = true;
    },

    closeMenu: function () {
      var items = Site.menuState.itemContainer.children;
      var height = items.length * 50;

      for (var i = 0; i < items.length; i++) {
        items[i].style['transition-delay'] = '';
        items[i].style['-webkit-transition-delay'] = '';
        items[i].style['-moz-transition-delay'] = '';
        items[i].style['-o-transition-delay'] = '';
        items[i].style['-ms-transition-delay'] = '';
      }

      Site.menuState.itemContainer.style.height = height + 'px';
      Site.menuState.rootElement.classList.add('menu-closed');
      Site.menuState.rootElement.classList.remove('menu-open');
      Site.menuState.open = false;

      setTimeout(function() {
        Site.menuState.itemContainer.style.height = '';
      }, 1);
    },

    toggleMenu: function (event) {
      event.stopPropagation();
      Site.menuState.open ? Site.closeMenu() : Site.openMenu();
    },

    initMenu: function (rootElement, menuButton, itemContainer) {
      Site.menuState.rootElement = rootElement;
      menuButton.addEventListener('click', function (event) { Site.toggleMenu(event); });
      Site.menuState.rootElement.classList.add('menu-closed');
      Site.menuState.itemContainer = itemContainer;
    },

    parsePhone: function (text) {
      var key = OBFUSCATION_KEY;
      var number = '';

      for (var i = 0; i < text.length; i++) {
        index = key.indexOf(text[i]);
        char = index > 9 ? '-' : index;

        number += char;
      }

      return number;
    },


    /**
     * unbfuscate email and tel links
     */
    parseLinks: function () {
      var links = document.querySelectorAll('.secretive-link');
      for (var i = 0; i < links.length; i++) {
        if (links[i].classList.contains('link-email')) {
          var href = links[i].attributes.href.nodeValue.replace('mailto:', '');
          var link = href.replace(/[a-zA-Z]/g,function(c){return String.fromCharCode((c<="Z"?90:122)>=(c=c.charCodeAt(0)+13)?c:c-26);});

          links[i].attributes.href.nodeValue = 'mailto:' + link;
          links[i].innerHTML = link;
        }

        // else if (links[i].classList.contains('link-tel')) {
        //   var href = links[i].attributes.href.nodeValue.replace('tel:', '');
        //   var link = Site.parsePhone(href)
        //
        //   links[i].attributes.href.nodeValue = 'tel:' + link.replace(/-/gi, '');
        //   links[i].innerHTML = link;
        // }
      }
    }
  }

  window.Site = Site;

  window.addEventListener('DOMContentLoaded', function () {
    Site.parseLinks();
    Site.loadAllImages();
  });
})(window);
