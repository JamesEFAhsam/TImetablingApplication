//to login like user - user name and pass user/user
//to login like manager - user name and pass manager/manager
function login() {
    if (location.href.indexOf('login.php') !== -1) {
        document.getElementById('loginA').addEventListener('click', function () {
            var name = document.getElementById('username').value;
            var pass = document.getElementById('password').value;
            if ((name === 'user') && (pass === 'user')) {
                alert('Logged Successfully');
                location.href = 'home.php';
            }
            else if ((name === 'manager') && (pass === 'manager')) {
                alert('Logged Successfully');
                location.href = 'managerhome.html';
            }

        });
    }
}

function addComment() {
    if (location.href.indexOf('managerhome.html') !== -1) {
        document.getElementById('comment').onclick = function (e) {
            e.target.value = '';
        }
        document.getElementById('comment').onkeypress = function (e) {
            if (e.keyCode === 13) {
                e.preventDefault();
                var comments = localStorage.getItem('comments') ?
                    JSON.parse(localStorage.getItem('comments')) : [];
                var comment = document.getElementById("comment").value;
                comments.push(comment);
                localStorage.setItem('comments', JSON.stringify(comments));
                alert('Comment added');
                e.target.value = "Insert comment here"
            }
        }
    }
}

function showComments() {
    if (location.href.indexOf('/home.php') !== -1) {
        document.getElementById('comments').value += 'Sales have been up this week!\r';
        var comments = localStorage.getItem('comments') ? JSON.parse(localStorage.getItem('comments')) : [];
        comments.forEach(function (elem) {
            document.getElementById('comments').value += elem + '\n';
        });

    }
}

function logOut() {
    document.getElementById('logOut').addEventListener('click', function (event) {
        if (confirm('Are you sure you want to LogOut?')) {
            event.preventDefault();
            window.location = 'login.php';
        } else {
            event.preventDefault();
        }
    });

}

function enableModal() {
    var modal = document.getElementById('myModal');
    var btn = document.getElementById("myBtn");
    var span = document.getElementsByClassName("close")[0];
    btn.onclick = function () {
        modal.style.display = "block";
    };

    span.onclick = function () {
        modal.style.display = "none";
    };

    window.onclick = function (event) {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    }
}

function submitRating() {
    if (location.href.indexOf('ratings.html') !== -1) {


        document.getElementById('submitRatings').onclick = function (e) {
            e.preventDefault();
            alert('Your vote Submitted');
            location.reload();
        }
    }
}

function submitPref() {
    if (location.href.indexOf('pref.html') !== -1) {
        function check() {

        }

        document.getElementById('submitPref').onclick = function (e) {
            e.preventDefault();
            alert('Your preferences Submitted');
            location.reload();
        }
    }
}

function submitHReq() {
    if (location.href.indexOf('requests.html') !== -1) {
        function check() {
            var inps = [];
            inps.push(document.querySelectorAll('input')[0]);
            inps.push(document.querySelectorAll('input')[1]);
            inps.forEach(function (el) {
                if (!el.value) {
                    flag = false;
                }
                else {
                    flag = true;
                }
            })
            return flag;

        }

        document.getElementById('submitHReq').onclick = function (e) {
            e.preventDefault();
            if (check() === false) {
                alert('Fill all fields, pls');
            } else {
                alert('You request Submitted');
                location.reload();
            }
        }
    }
}

function submitReq() {
    if (location.href.indexOf('requests.html') !== -1) {
        function check() {

            var inps = [];
            inps.push(document.querySelectorAll('input')[2]);
            inps.forEach(function (el) {
                if (!el.value) {
                    flag = false;
                }
                else {
                    flag = true;
                }
            });
            if (document.querySelector('select').selectedIndex === 0) {
                flag = false;
            } else {
                flag = true;
            }
            return flag;


        }

        document.getElementById('submitReq').onclick = function (e) {
            e.preventDefault();
            if (check() === false) {
                alert('Fill all fields, pls');
            } else {
                alert('You request Submitted');
                location.reload();
            }
        }
    }
}

function signUp() {
    if (location.href.indexOf('/signup.php') !== -1) {
        var inputs = document.querySelector('input');

        function check() {
            var flag = false;
            var inps = document.querySelectorAll('input');
            inps.forEach(function (el) {
                if (!el.value) {
                    flag = false;
                }
                else {
                    flag = true;
                }
            })
            return flag;
        }

        document.getElementById('signUp').onclick = function (e) {
            if (check() === false) {
                alert('Fill all fields, pls');
            } else {
                alert('Welcome yo our ROTA');
                location.href = 'home.html';
            }
        }
    }
    else if (location.href.indexOf('/managersignup.html') !== -1) {

        document.getElementById('signUpM').onclick = function (e) {
            alert('Welcome yo our ROTA');
            location.href = 'managerhome.html';
        }
    }
}


//function showing error message
function showPopUp(message) {
    var modal = document.getElementById('myModal');

    var span = document.getElementsByClassName("close")[0];
    var messageP = document.getElementById("message");
    messageP.textContent = message;
    modal.style.display = "block";

    span.onclick = function () {
        modal.style.display = "none";
    };
    window.onclick = function (event) {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    }
}

//change this value if you get error
var error = false;
window.onload = function () {

    login();
    addComment();
    showComments();
    submitRating();
    submitPref();
    submitReq();
    signUp();
    submitHReq();
    logOut();

//if we have error we are show error popUp with message what u need
    if (error) showPopUp('error has occured');
};

