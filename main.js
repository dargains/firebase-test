(function initFirebase() {
  var config = {
    apiKey: "AIzaSyDFjg6g6a3ioPgRkO-NP9nnp2DfrmYxUyo",
    authDomain: "dargains-test.firebaseapp.com",
    databaseURL: "https://dargains-test.firebaseio.com",
    storageBucket: "dargains-test.appspot.com",
    messagingSenderId: "136892732101"
  };
  firebase.initializeApp(config);
})();

var main = document.getElementById("page-content");
var signIn = document.getElementById("signIn");
var table = document.getElementById("table");
var loading = document.getElementById("loading-container");
var loginButton = document.getElementById("loginButton");
var signupButton = document.getElementById("signupButton");
var logoutButton = document.getElementById("logoutButton");
const database = firebase.database();
const usersDB = database.ref().child("users");

loginButton && loginButton.addEventListener("click", e => {
  var emailVal = email.value,
      passwordVal = password.value;
  const auth = firebase.auth();
  const promise = auth.signInWithEmailAndPassword(emailVal, passwordVal);
  promise.catch(e => {
    loginError.innerHTML = e.message;
  });
});
signupButton && signupButton.addEventListener("click", e => {
  var emailVal = email.value,
      passwordVal = password.value;
  const auth = firebase.auth();
  const promise = auth.createUserWithEmailAndPassword(emailVal, passwordVal);
  promise.catch(e => {
    loginError.innerHTML = e.message;
  });
});
logoutButton && logoutButton.addEventListener("click", e => {
  firebase.auth().signOut();
  window.location.href = "index.php";
});
firebase.auth().onAuthStateChanged(firebaseUser => {
  if (firebaseUser) {
    logoutButton && logoutButton.classList.remove("hidden");
    signIn && (window.location.href = "list.php");
    var navItems = document.getElementsByTagName("nav");
    for (let i = 0; i < navItems.length; i++) {
      navItems[i].style.display = "flex";
    };
  }
  else {
    logoutButton && logoutButton.classList.add("hidden");
    var navItems = document.getElementsByTagName("nav");
    for (let i = 0; i < navItems.length; i++) {
      navItems[i].style.display = "none";
    };
  }
});

function getUsers() {
  usersDB.on("child_added", function (snapshot) {
    var key = snapshot.key,
        name = snapshot.child("name").val(),
        email = snapshot.child("email").val();
    createListLine(key, name, email);
    Array.from(document.querySelectorAll(".row")).forEach(row => {
      row.addEventListener("click", function () {
        goToEdit(this)
      });
    });
    
    clearLoading();
  });
  usersDB.on("child_removed", function (snapshot) {
    table.removeChild(document.getElementById(snapshot.key));
  });
  usersDB.on("child_changed", function (snapshot) {
    var key = snapshot.key,
        name = snapshot.child("name").val(),
        email = snapshot.child("email").val();
    table.removeChild(document.getElementById(key));
    createListLine(key, name, email);
  });
};
function submitUser() {
  submitButton.setAttribute("disabled", true);
  var name = document.getElementById("name").value,
      email = document.getElementById("email").value,
      newUser = {name:name, email:email};
  usersDB.once("value", function (snapshot) {
    usersDB.push(newUser);
    form.reset();
    submitButton.removeAttribute("disabled");
  });
};
function showMsg(state) {
  if (state) {
    setTimeout(() => {
      successMsg.style.visibility = "hidden";
    }, 2000);
    successMsg.style.visibility = "visible";
  }
  else {
    setTimeout(() => {
      errorMsg.style.visibility = "hidden";
    }, 2000);
    errorMsg.style.visibility = "visible";
  }
};
function deleteUser(e) {
  e = e || window.event;
  e.stopPropagation();
  var target = e.target || e.srcElement;
  var key = target.parentElement.parentElement.id;
  usersDB.child(key).remove();
};
function createListLine(key, name, email) {
  var row = table.insertRow(0),
      cell1 = row.insertCell(0),
      cell2 = row.insertCell(1),
      cell3 = row.insertCell(2);
  cell1.innerHTML = name;
  cell2.innerHTML = email;
  cell3.innerHTML = '<i class="material-icons mdl-list__item-icon deleteIcon deleteButton" onclick="deleteUser(event)">delete</i>';
  row.id = key;
  row.className = "row ";
};
function clearLoading() {
  if (loading) main.removeChild(loading);
  loading = false;
};
function goToEdit(event) {
  var name = event.childNodes[0].innerHTML,
      email = event.childNodes[1].innerHTML,
      key = event.id;
  window.location.href = `./editUser.php?name=${name}&email=${email}&key=${key}`
};
function editUser() {
  var name = document.getElementById("name").value,
      email = document.getElementById("email").value,
      key = document.getElementById("key").value,
      newUser = {name:name, email:email};
  usersDB.child(key).set(newUser);
  editButton.removeAttribute("disabled");
};
function hasClass(element, cls) {
  return (' ' + element.className + ' ').indexOf(' ' + cls + ' ') > -1;
};
if (table != null) getUsers();