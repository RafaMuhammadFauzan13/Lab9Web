<?php
if (sudahLogin()) {
    header('Location: ' . baseUrl() . 'index.php?page=barang/list');
    exit;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    $stmt = mysqli_prepare($conn, "SELECT id, username, password FROM users WHERE username = ?");
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $user = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));

    if ($user && password_verify($password, $user['password'])) {
        session_regenerate_id(true);
        $_SESSION['user'] = ['id' => (int) $user['id'], 'username' => $user['username']];
        setPesan('sukses', 'Login berhasil.');
        header('Location: ' . baseUrl() . 'index.php?page=barang/list');
        exit;
    }
    $error = 'Username atau password salah.';
}
?>
<h2>Login</h2>
<div class="main">
    <?php if ($error !== ''): ?>
    <p style="color: red;"><?= e($error); ?></p>
    <?php endif; ?>

    <form method="post" action="index.php?page=auth/login">
        <div class="input">
            <label>Username</label>
            <input type="text" name="username" value="<?= e($_POST['username'] ?? ''); ?>" />
        </div>
        <div class="input">
            <label>Password</label>
            <input type="password" name="password" />
        </div>
        <div class="submit">
            <input type="submit" value="Login" />
        </div>
    </form>
</div>