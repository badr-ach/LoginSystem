<nav class="top-nav">
    <ul>
        <li>
            <a href="<?php echo URL; ?>/index">Home</a>
        </li>
        <li>
            <a href="<?php echo URL; ?>/about">About</a>
        </li>
        <li>
            <a href="<?php echo URL; ?>/projects">Projects</a>
        </li>
        <li>
            <a href="<?php echo URL; ?>/posts">Blog</a>
        </li>
        <li>
            <a href="<?php echo URL; ?>/contact">Contact</a>
        </li>
        <li class="btn-login">
            <?php if(isset($_SESSION['user_id'])) : ?>
                <a href="<?php echo URL; ?>/users/logout">Log out</a>
            <?php else : ?>
                <a href="<?php echo URL; ?>/users/login">Login</a>
            <?php endif; ?>
        </li>
    </ul>
</nav>
