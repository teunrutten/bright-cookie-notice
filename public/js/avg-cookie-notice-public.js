document.addEventListener('DOMContentLoaded', function() {
  CookieNotice()
})

function CookieNotice() {
  var acceptLink = document.querySelector('.js-confirm-cookies')
  var notice = document.querySelector('.js-cookie-notice')
  var deleteButtons = document.querySelectorAll('.js-delete-cookies')
  if (acceptLink && notice) {
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
                expires: 7
              }
            )
          } else if (analytics) {
            window.Cookies.set('bright_avg_cookie_consent', 'analytics', {
              expires: 7
            })
          } else if (tracking) {
            window.Cookies.set('bright_avg_cookie_consent', 'tracking', {
              expires: 7
            })
          } else {
            window.Cookies.set('bright_avg_cookie_consent', 'none', {
              expires: 7
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
    element.parentNode.removeChild(element)
  }
}
