const togglePassword = document.getElementById("togglePassword");
const passwordInput = document.getElementById("password");

togglePassword.addEventListener("click", () => {
    const type = passwordInput.type === "password" ? "text" : "password";
    passwordInput.type = type;
    togglePassword.classList.toggle("fa-eye-slash");
});

function validateLogin(event) {
    event.preventDefault();

    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;
    const errorMessage = document.getElementById('error-message');

    const users = {
        "admin": {
            password: "123456",
            redirect: "./home_admin.php"  // Tambahkan `./` untuk pastikan path relatif
        },
        "user": {
            password: "user123",
            redirect: "./home_user.html"
        }
    };

    // Validasi login
    if (users[username] && users[username].password === password) {
        // Simpan status login di localStorage
        localStorage.setItem("isLoggedIn", "true");
        localStorage.setItem("username", username);

        // Redirect ke halaman yang sesuai
        window.location.href = users[username].redirect;
    } else {
        errorMessage.textContent = "Username atau password salah!";
    }

    return false;
}

// Cek status login saat page load (opsional)
document.addEventListener('DOMContentLoaded', function () {
    if (localStorage.getItem("isLoggedIn") === "true") {
        const username = localStorage.getItem("username");
        const users = {
            "admin": { redirect: "home_admin.php" },
            "user": { redirect: "home_user.html" }
        };

        if (users[username]) {
            window.location.href = users[username].redirect;
        } else {
            localStorage.clear();
        }
    }
});