var _paq = window._paq || [];

/* tracker methods like "setCustomDimension" should be called before "trackPageView" */
_paq.push(['setCustomVariable', 1, 'Site', piwik.idSite, 'page']);

_paq.push(['trackPageView']);
_paq.push(['enableLinkTracking']);

(function() {
  var u = piwik.url;

  _paq.push(['setTrackerUrl', u + '/' + piwik.platform +'.php']);
  _paq.push(['setSiteId', piwik.siteId]);
  _paq.push(['setUserId', piwik.userLogin]);

  var d = document,
      g = d.createElement('script'),
      s = d.getElementsByTagName('script')[0];

  g.type = 'text/javascript';
  g.async = true;
  g.defer = true;
  g.src = u + '/' + piwik.platform + '.js';

  s.parentNode.insertBefore(g, s);
})();
