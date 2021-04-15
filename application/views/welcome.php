<?php $this->load->view('partials/welcome_header.php')?>
 
    <div class="main-container">
        <h1>Welcome! <?=$this->session->userdata('first_name')?></h1>
        <a href="/students/logout">Log Off</a>
        <section>
            <div class="info">
                <p>First Name: </p>
                <p>Last Name: </p>
                <p>Email: </p>
            </div>
            <div class="values">
                <p><?=$this->session->userdata('first_name')?></p>
                <p><?=$this->session->userdata('last_name')?></p>
                <p><?=$this->session->userdata('email')?></p>
            </div>
        </section>
    </div>

<?php $this->load->view('partials/welcome_footer.php')?>