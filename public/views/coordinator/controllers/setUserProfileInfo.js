document.addEventListener('DOMContentLoaded', () => {
  const userProfile = document.getElementById('user-profile')
  userProfile.setAttribute('profile-img', window.localStorage.getItem('userPhoto'))
  userProfile.setAttribute('desc-img','coordinator photo profile')
  userProfile.setAttribute('user-number', window.localStorage.getItem('employeeNumber') || window.localStorage.getItem('DNI') || 'Not found')
  userProfile.setAttribute('user-email', window.localStorage.getItem('userInstEmail'))
  userProfile.setAttribute('user-name', window.localStorage.getItem('userFirstName') + ' ' + window.localStorage.getItem('userLastName'))
  userProfile.setAttribute('user-phone', window.localStorage.getItem('userPhoneNumber'))
})