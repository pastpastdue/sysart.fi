var Site = {
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
    }
  }
}

window.addEventListener('DOMContentLoaded', function () {
  Site.parseLinks();
});
