/**
 * Polyfill for Array.from
 * Source: developer.mozilla(.)org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Array/from
 * Production steps of ECMA-262, Edition 6, 22.1.2.1
 */
Array.from||(Array.from=function(){var r=Object.prototype.toString,t=function(t){return"function"==typeof t||"[object Function]"===r.call(t)},n=Math.pow(2,53)-1,e=function(r){var t,e=(t=Number(r),isNaN(t)?0:0!==t&&isFinite(t)?(t>0?1:-1)*Math.floor(Math.abs(t)):t);return Math.min(Math.max(e,0),n)};return function(r){var n=Object(r);if(null==r)throw new TypeError("Array.from requires an array-like object - not null or undefined");var o,a=arguments.length>1?arguments[1]:void 0;if(void 0!==a){if(!t(a))throw new TypeError("Array.from: when provided, the second argument must be a function");arguments.length>2&&(o=arguments[2])}for(var i,u=e(n.length),f=t(this)?Object(new this(u)):new Array(u),c=0;c<u;)i=n[c],f[c]=a?void 0===o?a(i,c):a.call(o,i,c):i,c+=1;return f.length=u,f}}());
// End polyfill

document.addEventListener('DOMContentLoaded', function() {
  CookieNotice()
})

function CookieNotice() {
  var acceptLink = document.querySelector('.js-confirm-cookies')
  var notice = document.querySelector('.js-cookie-notice')
  var deleteButtons = document.querySelectorAll('.js-delete-cookies')
  if (acceptLink && notice) {
    if (
      notice.classList.contains('fixed') &&
      notice.classList.contains('top')
    ) {
      document.body.classList.add('bright-avg-cookie-notice-active')
      document.body.style.marginTop = notice.clientHeight + 'px'
    } else if (
      notice.classList.contains('fixed') &&
      notice.classList.contains('bottom')
    ) {
      document.body.classList.add('bright-avg-cookie-notice-active')
      document.body.style.marginBottom = notice.clientHeight + 'px'
    }
    var analytics = null
    var tracking = null
    if (!window.Cookies.get('bright_avg_cookie_consent')) {
      window.Cookies.set('bright_avg_no_cookie', 'no_cookie', { expires: 365 })
    }
    acceptLink.addEventListener('click', function(e) {
      e.preventDefault()
      if (window.Cookies.get('bright_avg_no_cookie')) {
        window.Cookies.remove('bright_avg_no_cookie')
      }
      var inputs = notice.querySelectorAll('input')
      Array.from(inputs).forEach(function(input, index) {
        if (input.name === 'tracking') {
          tracking = input.checked
        }
        if (input.name === 'analytics') {
          analytics = input.checked
        }
        if (index === inputs.length - 1) {
          if (analytics && tracking) {
            window.Cookies.set(
              'bright_avg_cookie_consent',
              'analytics_tracking',
              {
                expires: 365
              }
            )
          } else if (analytics) {
            window.Cookies.set('bright_avg_cookie_consent', 'analytics', {
              expires: 1
            })
          } else if (tracking) {
            window.Cookies.set('bright_avg_cookie_consent', 'tracking', {
              expires: 365
            })
          } else {
            window.Cookies.set('bright_avg_cookie_consent', 'none', {
              expires: 1
            })
          }
          if (window.Cookies.get('bright_avg_cookie_consent')) {
            remove(notice)
            window.location.reload()
          }
        }
      })
    })
  }

  if (deleteButtons.length) {
    Array.from(deleteButtons).forEach(function(deleteButton) {
      deleteButton.addEventListener('click', function(e) {
        e.preventDefault()
        if (window.Cookies.get('bright_avg_cookie_consent')) {
          window.Cookies.remove('bright_avg_cookie_consent')
          window.location = window.location.href
          window.location.reload()
        }
      })
    })
  }

  /**
   * Remove an element from the the dom
   */
  function remove(element) {
    document.body.style.marginBottom = '0px'
    document.body.style.marginTop = '0px'
    element.parentNode.removeChild(element)
  }
}
