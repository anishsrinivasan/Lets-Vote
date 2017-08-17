$(document).ready(function() { 
  
// Initialize Firebase
  var config = {
    apiKey: "AIzaSyB4sXlW6IAKZX-KD0T0Z8ZrD2MbGeIX1Es",
    authDomain: "codeslashes-14cd1.firebaseapp.com",
    databaseURL: "https://codeslashes-14cd1.firebaseio.com",
    projectId: "codeslashes-14cd1",
    storageBucket: "codeslashes-14cd1.appspot.com",
    messagingSenderId: "403119997608"
  };
  firebase.initializeApp(config);

  //Get Elements

  const txtEmail = document.getElementById('txtEmail');
  const txtPassword = document.getElementById('txtPassword');
  const btnLogin = document.getElementById('btnLogin');
  const btnSignUp = document.getElementById('btnSignUp');
  const btnLogout = document.getElementById('btnLogout');

   //Add SignUp Event 

  btnLogin.addEventListener('click', e => {
    
    const email = txtEmail.value;
    const pass = txtPassword.value;
    const auth = firebase.auth();

    const promise = auth.signInWithEmailAndPassword(email,pass);
    promise.catch(e => alert(e.message));
    firebase.auth().onAuthStateChanged(firebaseUser => {
    if(firebaseUser) {
      alert("Hola user"); }
    });
    
    }  );


  //Add SignUp Event 

  btnSignUp.addEventListener('click', e => {

    const email = txtEmail.value;
    const pass = txtPassword.value;
    const auth = firebase.auth();

    const promise = auth.createUserWithEmailAndPassword(email,pass);
    promise.catch(e => alert(e.message));
    }  );

  // Firebase Realtime

  firebase.auth().onAuthStateChanged(firebaseUser => {
    if(firebaseUser) {
      console.log(firebaseUser);
      btnLogout.classList.remove('invisible');
      btnLogin.classList.add('invisible');
      btnSignUp.classList.add('invisible');
    }else{
      console.log("Not Logged In");
      btnLogout.classList.add('invisible');
      btnLogin.classList.remove('invisible');
      btnSignUp.classList.remove('invisible');
    }
    });

btnLogout.addEventListener('click', e => {

    firebase.auth().signOut();
     }  );
$('input').blur(function() {
    var $this = $(this);
    if ($this.val())
      $this.addClass('used');
    else
      $this.removeClass('used');
  });

  var $ripples = $('.ripples');

  $ripples.on('click.Ripples', function(e) {

    var $this = $(this);
    var $offset = $this.parent().offset();
    var $circle = $this.find('.ripplesCircle');

    var x = e.pageX - $offset.left;
    var y = e.pageY - $offset.top;

    $circle.css({
      top: y + 'px',
      left: x + 'px'
    });

    $this.addClass('is-active');

  });

  $ripples.on('animationend webkitAnimationEnd mozAnimationEnd oanimationend MSAnimationEnd', function(e) {
  	$(this).removeClass('is-active');
  });

      });