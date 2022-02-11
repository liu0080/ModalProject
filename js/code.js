var check = function() {
    if (document.getElementById('password').value ==
      document.getElementById('confirm_password').value) {
      document.getElementById('message').
      document.getElementById('message').innerHTML = "&#x2714 Your password are matching";
    } else {
      document.getElementById('message').style.color = 'red';
      document.getElementById('message').innerHTML = '&#10060 Your passwords are not matching';
    }
  }