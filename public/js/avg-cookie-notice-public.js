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
    acceptLink.addEventListener('click', function(e) {
      e.preventDefault()
      var inputs = notice.querySelectorAll('input')
      ;[...inputs].forEach(function(input, index) {
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
    ;[...deleteButtons].forEach(function(deleteButton) {
      deleteButton.addEventListener('click', function(e) {
        e.preventDefault()
        if (window.Cookies.get('bright_avg_cookie_consent')) {
          window.Cookies.remove('bright_avg_cookie_consent')
          window.location = window.location.href + '#top'
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
