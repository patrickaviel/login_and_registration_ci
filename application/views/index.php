<?php $this->load->view('partials/index_header.php')?>
    <div class="main-container">
        <div class="register">
            <h1>Register</h1>
            <form action="students/register" method="POST">
                <input type="text" name="first_name" id="" placeholder="First Name">
                <input type="text" name="last_name" id="" placeholder="Last Name">
                <input type="text" name="email" id="" placeholder="Email">
                <input type="password" name="password" id="" placeholder="Password">
                <input type="password" name="c_password" id="" placeholder="Confirm Password">
                <input type="submit" value="Register">
                <?php echo $this->session->flashdata('errors_register'); ?>
            </form>
        </div>
        <div class="login">
            <h1>Login</h1>
            <form action="students/login" method="POST">
                
                <input type="text" name="email" id="" placeholder="Email">
                <input type="password" name="password" id="" placeholder="Password">
                <input type="submit" value="Login">
                <?php echo $this->session->flashdata('errors_login');  ?>
            </form>
        </div>
    </div>
<?php $this->load->view('partials/index_footer.php')?>